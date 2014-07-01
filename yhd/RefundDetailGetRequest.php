<?php
/**
*获取单个退货详情
*/

class RefundDetailGetRequest {

	private $apiParas = array();
		
	public function getApiParas()
	{
		return $this->apiParas;
	}

	/**退货单号*/
	private  $refundCode; 

	public function getRefundCode(){
		return $this->refundCode;
	}

	public function setRefundCode($refundCode){
		$this->refundCode = $refundCode;
		$this->apiParas["refundCode"] = $refundCode;
	}

	
}
