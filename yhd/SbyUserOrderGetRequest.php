<?php
/**
*查询用户历史app订单
*/

class SbyUserOrderGetRequest {

	private $apiParas = array();
		
	public function getApiParas()
	{
		return $this->apiParas;
	}

	/**sby用户id*/
	private  $sbyUserId; 

	public function getSbyUserId(){
		return $this->sbyUserId;
	}

	public function setSbyUserId($sbyUserId){
		$this->sbyUserId = $sbyUserId;
		$this->apiParas["sbyUserId"] = $sbyUserId;
	}

	
}
