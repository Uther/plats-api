<?php
/**
*根据订单编号获取订单详情
*/

class SbyUserOrderDetailGetRequest {

	private $apiParas = array();
		
	public function getApiParas()
	{
		return $this->apiParas;
	}

	/**订单号*/
	private  $orderNo; 

	public function getOrderNo(){
		return $this->orderNo;
	}

	public function setOrderNo($orderNo){
		$this->orderNo = $orderNo;
		$this->apiParas["orderNo"] = $orderNo;
	}

	
}
