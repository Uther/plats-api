<?php
class JosClient {
	public $appkey;
	public $secretKey;
	public $gatewayUrl = "http://gw.api.360buy.com/routerjson";
	protected $apiVersion = "2.0";
	public $checkRequest = false;
	public $logData = false;
	public $runtime;
	public function execute(JosRequest $request, $session = null) {
		$result = new stdClass ();
		if ($this->checkRequest) {
			try {
				$request->check ();
			} catch ( Exception $e ) {
				$result->code = $e->getCode ();
				$result->zh_desc = "api请求参数验证失败";
				$result->en_desc = $e->getMessage ();
				return $result;
			}
		}
		// 组装系统参数
		$sysParams ['app_key'] = $this->appkey;
		$sysParams ['v'] = $this->apiVersion;
		$sysParams ['method'] = $request->getApiMethod ();
		if ($session !== null) {
			$sysParams ['access_token'] = $session;
		}
		//$sysParams ['timestamp'] = date("Y-m-d H:i:s");
		$sysParams ['timestamp'] = date("Y-m-d H:i:s", time()+28800);
		
		// 获取业务参数
		$apiParams ["360buy_param_json"] = $request->getAppJsonParams ();
		// 签名
		$sysParams ["sign"] = $this->generateSign ( array_merge ( $sysParams, $apiParams ) );
		
		$requestUrl = $this->gatewayUrl . '?' . http_build_query ( $sysParams );
		
		// 发送http请求
		try {
			$resp = $this->curl ( $requestUrl, $apiParams );
		} catch ( Exception $e ) {
			$result->code = $e->getCode ();
			$request->zh_desc = "curl发送http请求失败";
			$result->en_desc = $e->getMessage ();
			return $result;
		}
		// 解析返回结果
		$respWellFormed = false;
		$respObject = json_decode ( $resp );
		if (null !== $respObject) {
			$respWellFormed = true;
			foreach ( $respObject as $propKey => $propValue ) {
				$respObject = $propValue;
			}
		}
		if ($this->logData && is_dir ( $this->runtime )) { // 记录交互数据
			$logData ['time'] = date ( 'Y-m-d H:i:s' );
			$logData ['sysParams'] = $sysParams;
			$logData ['apiParams'] = $apiParams;
			$logData ['apiParams'] ['360buy_param_json'] = json_decode ( $apiParams ['360buy_param_json'] );
			$logData ['resp'] = $respObject;
			$logData = print_r ( $logData, true );
			$logfile = $this->runtime . '/' . date ( 'Y-m-d' );
			if (! is_dir ( $logfile )) {
				mkdir ( $logfile );
			}
			$logfile = sprintf ( '%s/%s.log', $logfile, uniqid ( date ( '(H.i.s) ' ) ) );
			@file_put_contents ( $logfile, $logData );
		}
		if (false === $respWellFormed) {
			$result->code = 0;
			$result->zh_desc = "api返回数据错误或程序无法解析返回参数";
			$result->en_desc = "HTTP_RESPONSE_NOT_WELL_FORMED";
			return $result;
		}
		return $respObject;
	}
	/**
	 * 签名
	 *
	 * @param $params 业务参数        	
	 * @return void
	 */
	private function generateSign($params) {
		if ($params != null) { // 所有请求参数按照字母先后顺序排序
			ksort ( $params );
			
			// 定义字符串开始 结尾所包括的字符串
			$stringToBeSigned = $this->secretKey;
			// 把所有参数名和参数值串在一起
			foreach ( $params as $k => $v ) {
				$stringToBeSigned .= "$k$v";
			}
			unset ( $k, $v );
			
			// 把venderKey加在字符串的两端
			$stringToBeSigned .= $this->secretKey;
		} else {
			// 定义字符串开始 结尾所包括的字符串
			$stringToBeSigned = $this->secretKey;
			// 把venderKey加在字符串的两端
			$stringToBeSigned .= $this->secretKey;
		}
		// 使用MD5进行加密，再转化成大写
		
		return strtoupper ( md5 ( $stringToBeSigned ) );
	}
	public function curl($url, $postFields = null) {
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_FAILONERROR, false );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		// https 请求
		if (strlen ( $url ) > 5 && strtolower ( substr ( $url, 0, 5 ) ) == "https") {
			curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, false );
		}
		
		if (is_array ( $postFields ) && 0 < count ( $postFields )) {
			curl_setopt ( $ch, CURLOPT_POST, true );
			$postMultipart = false;
			foreach ( $postFields as $k => $v ) {
				if ('@' == substr ( $v, 0, 1 )) {
					$postMultipart = true;
					break;
				}
			}
			unset ( $k, $v );
			if ($postMultipart) {
				curl_setopt ( $ch, CURLOPT_POSTFIELDS, $postFields );
			} else {
				curl_setopt ( $ch, CURLOPT_POSTFIELDS, http_build_query ( $postFields ) );
			}
		}
		$reponse = curl_exec ( $ch );
		
		if (curl_errno ( $ch )) {
			throw new Exception ( curl_error ( $ch ), 0 );
		} else {
			$httpStatusCode = curl_getinfo ( $ch, CURLINFO_HTTP_CODE );
			if (200 !== $httpStatusCode) {
				throw new Exception ( $reponse, $httpStatusCode );
			}
		}
		curl_close ( $ch );
		return $reponse;
	}
}