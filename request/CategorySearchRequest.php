<?php
class CategorySearchRequest extends JosRequest {
	/**
	 *
	 * @var 需返回的字段列表
	 */
	private $fields;
	
	/**
	 * 首先需要对业务参数进行安装首字母排序，然后将业务参数转换json字符串
	 *
	 * @return string
	 */
	public function getAppJsonParams() {
		$apiParams ["fields"] = $this->fields;
		ksort ( $apiParams );
		return json_encode ( $apiParams );
	}
	public function getApiMethod() {
		return '360buy.warecats.get';
	}
	
	/**
	 *
	 * @param
	 *        	$fields
	 */
	public function setFields($fields) {
		$this->fields = $fields;
	}
	
	/**
	 *
	 * @return
	 *
	 *
	 *
	 */
	public function getFields() {
		return $this->fields;
	}
}