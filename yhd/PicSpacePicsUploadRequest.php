<?php
/**
*批量上传图片到图片空间
*/

class PicSpacePicsUploadRequest {

	private $apiParas = array();
		
	public function getApiParas()
	{
		return $this->apiParas;
	}

	/**图片分类ID(默认为默认分类)*/
	private  $picCategoryId; 

	public function getPicCategoryId(){
		return $this->picCategoryId;
	}

	public function setPicCategoryId($picCategoryId){
		$this->picCategoryId = $picCategoryId;
		$this->apiParas["picCategoryId"] = $picCategoryId;
	}

	
}
