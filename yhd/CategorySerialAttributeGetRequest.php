<?php
/**
*查询类别系列属性
*/

class CategorySerialAttributeGetRequest {

	private $apiParas = array();
		
	public function getApiParas()
	{
		return $this->apiParas;
	}

	/**类别ID*/
	private  $categoryId; 

	public function getCategoryId(){
		return $this->categoryId;
	}

	public function setCategoryId($categoryId){
		$this->categoryId = $categoryId;
		$this->apiParas["categoryId"] = $categoryId;
	}

	
}
