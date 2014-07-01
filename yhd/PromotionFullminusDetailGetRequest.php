<?php
/**
*查询单个满减促销详情
*/

class PromotionFullminusDetailGetRequest {

	private $apiParas = array();
		
	public function getApiParas()
	{
		return $this->apiParas;
	}

	/**促销的id*/
	private  $id; 
	/**		满减类型1：商品   2:分类   3:分类 品牌,4:全场	*/
	private  $fullMinusType; 

	public function getId(){
		return $this->id;
	}
	public function getFullMinusType(){
		return $this->fullMinusType;
	}

	public function setId($id){
		$this->id = $id;
		$this->apiParas["id"] = $id;
	}
	public function setFullMinusType($fullMinusType){
		$this->fullMinusType = $fullMinusType;
		$this->apiParas["fullMinusType"] = $fullMinusType;
	}

	
}
