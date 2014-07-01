<?php
/**
*删除图片空间的图片
*/

class PicSpacePicDelRequest {

	private $apiParas = array();
		
	public function getApiParas()
	{
		return $this->apiParas;
	}

	/**图片空间的图片唯一标识*/
	private  $picSpaceId; 

	public function getPicSpaceId(){
		return $this->picSpaceId;
	}

	public function setPicSpaceId($picSpaceId){
		$this->picSpaceId = $picSpaceId;
		$this->apiParas["picSpaceId"] = $picSpaceId;
	}

	
}
