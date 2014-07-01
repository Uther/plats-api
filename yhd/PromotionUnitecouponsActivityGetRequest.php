<?php
/**
*获取指定id的联合发券活动
*/

class PromotionUnitecouponsActivityGetRequest {

	private $apiParas = array();
		
	public function getApiParas()
	{
		return $this->apiParas;
	}

	/**活动id*/
	private  $id; 

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
		$this->apiParas["id"] = $id;
	}

	
}
