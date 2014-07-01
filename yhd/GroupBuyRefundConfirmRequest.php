<?php
/**
*消费券退款确认
*/

class GroupBuyRefundConfirmRequest {

	private $apiParas = array();
		
	public function getApiParas()
	{
		return $this->apiParas;
	}

	/**1号商城订单号码*/
	private  $orderCode; 
	/**合作方订单号码*/
	private  $partnerOrderCode; 
	/**退款金额*/
	private  $refundAmount; 
	/**退款确认时间(格式：yyyy-MM-ddHH:mm:ss)*/
	private  $refundConfirmTime; 

	public function getOrderCode(){
		return $this->orderCode;
	}
	public function getPartnerOrderCode(){
		return $this->partnerOrderCode;
	}
	public function getRefundAmount(){
		return $this->refundAmount;
	}
	public function getRefundConfirmTime(){
		return $this->refundConfirmTime;
	}

	public function setOrderCode($orderCode){
		$this->orderCode = $orderCode;
		$this->apiParas["orderCode"] = $orderCode;
	}
	public function setPartnerOrderCode($partnerOrderCode){
		$this->partnerOrderCode = $partnerOrderCode;
		$this->apiParas["partnerOrderCode"] = $partnerOrderCode;
	}
	public function setRefundAmount($refundAmount){
		$this->refundAmount = $refundAmount;
		$this->apiParas["refundAmount"] = $refundAmount;
	}
	public function setRefundConfirmTime($refundConfirmTime){
		$this->refundConfirmTime = $refundConfirmTime;
		$this->apiParas["refundConfirmTime"] = $refundConfirmTime;
	}

	
}
