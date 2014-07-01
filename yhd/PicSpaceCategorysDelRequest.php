<?php
/**
*批量删除图片空间分类
*/

class PicSpaceCategorysDelRequest {

	private $apiParas = array();
		
	public function getApiParas()
	{
		return $this->apiParas;
	}

	/**图片分类ID列表。多个分类ID之间用逗号分隔，最大100个。*/
	private  $picCategoryIdList; 

	public function getPicCategoryIdList(){
		return $this->picCategoryIdList;
	}

	public function setPicCategoryIdList($picCategoryIdList){
		$this->picCategoryIdList = $picCategoryIdList;
		$this->apiParas["picCategoryIdList"] = $picCategoryIdList;
	}

	
}
