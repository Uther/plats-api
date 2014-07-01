<?php
/**
*确认退货
*/

class RefundConfirmRequest {

	private $apiParas = array();
		
	public function getApiParas()
	{
		return $this->apiParas;
	}

	/**退货单编码*/
	private  $refundCode; 

	public function getRefundCode(){
		return $this->refundCode;
	}

	public function setRefundCode($refundCode){
		$this->refundCode = $refundCode;
		$this->apiParas["refundCode"] = $refundCode;
	}

	
}
