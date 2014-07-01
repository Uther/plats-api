<?php
/**
*获取单个订单详情
*/

class OrderDetailGetRequest {

	private $apiParas = array();
		
	public function getApiParas()
	{
		return $this->apiParas;
	}

	/**订单编码*/
	private  $orderCode; 

	public function getOrderCode(){
		return $this->orderCode;
	}

	public function setOrderCode($orderCode){
		$this->orderCode = $orderCode;
		$this->apiParas["orderCode"] = $orderCode;
	}

	
}
