<?php
/**
 * TOP API: taobao.weitao.fansright.send request
 * 
 * @author auto create
 * @since 1.0, 2013-12-19 00:00:00
 */
class WeitaoFansrightSendRequest
{
	/** 
	 * 权益字符串
	 **/
	private $rightStr;
	
	private $apiParas = array();
	
	public function setRightStr($rightStr)
	{
		$this->rightStr = $rightStr;
		$this->apiParas["right_str"] = $rightStr;
	}

	public function getRightStr()
	{
		return $this->rightStr;
	}

	public function getApiMethodName()
	{
		return "taobao.weitao.fansright.send";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->rightStr,"rightStr");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
