<?php
/**
*取消单个满就换购详情促销
*/

class PromotionFullchangeSingleCancelRequest {

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
