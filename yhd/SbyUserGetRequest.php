<?php
/**
*根据商家ID获取SBY用户ID
*/

class SbyUserGetRequest {

	private $apiParas = array();
		
	public function getApiParas()
	{
		return $this->apiParas;
	}

	/**商家ID*/
	private  $merchantId; 

	public function getMerchantId(){
		return $this->merchantId;
	}

	public function setMerchantId($merchantId){
		$this->merchantId = $merchantId;
		$this->apiParas["merchantId"] = $merchantId;
	}

	
}
