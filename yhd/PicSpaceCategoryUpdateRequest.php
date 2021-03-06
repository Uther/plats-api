<?php
/**
*更新图片空间类别
*/

class PicSpaceCategoryUpdateRequest {

	private $apiParas = array();
		
	public function getApiParas()
	{
		return $this->apiParas;
	}

	/**图片空间类别Id*/
	private  $picCategoryId; 
	/**图片空间类别名称（最长10个字）*/
	private  $picCategoryName; 

	public function getPicCategoryId(){
		return $this->picCategoryId;
	}
	public function getPicCategoryName(){
		return $this->picCategoryName;
	}

	public function setPicCategoryId($picCategoryId){
		$this->picCategoryId = $picCategoryId;
		$this->apiParas["picCategoryId"] = $picCategoryId;
	}
	public function setPicCategoryName($picCategoryName){
		$this->picCategoryName = $picCategoryName;
		$this->apiParas["picCategoryName"] = $picCategoryName;
	}

	
}
