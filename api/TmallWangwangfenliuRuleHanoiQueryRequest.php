<?php
/**
 * TOP API: tmall.wangwangfenliu.rule.hanoi.query request
 * 
 * @author auto create
 * @since 1.0, 2013-04-25 12:45:19
 */
class TmallWangwangfenliuRuleHanoiQueryRequest
{
	
	private $apiParas = array();
	
	public function getApiMethodName()
	{
		return "tmall.wangwangfenliu.rule.hanoi.query";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
