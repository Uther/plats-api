<?php
/**
*查询商家被授权产品类别列表
*/

class CategoryProductsGetRequest {

	private $apiParas = array();
		
	public function getApiParas()
	{
		return $this->apiParas;
	}

	/**父类别ID（0：根节点）*/
	private  $categoryParentId; 

	public function getCategoryParentId(){
		return $this->categoryParentId;
	}

	public function setCategoryParentId($categoryParentId){
		$this->categoryParentId = $categoryParentId;
		$this->apiParas["categoryParentId"] = $categoryParentId;
	}

	
}
