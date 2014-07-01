<?php
/**
*取消单个满就送赠品详情促销
*/

class PromotionFullgiftSingleCancelRequest {

	private $apiParas = array();
		
	public function getApiParas()
	{
		return $this->apiParas;
	}

	/**促销的id*/
	private  $cancelId; 

	public function getCancelId(){
		return $this->cancelId;
	}

	public function setCancelId($cancelId){
		$this->cancelId = $cancelId;
		$this->apiParas["cancelId"] = $cancelId;
	}

	
}
