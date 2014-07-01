<?php
/**
*新增系列产品子品
*/

class SerialChildProductsAddRequest {

	private $apiParas = array();
		
	public function getApiParas()
	{
		return $this->apiParas;
	}

	/**系列产品外部编码*/
	private  $outerId; 
	/**系列产品子品新增信息列表*/
	private  $serialChildProductsList; 

	public function getOuterId(){
		return $this->outerId;
	}
	public function getSerialChildProductsList(){
		return $this->serialChildProductsList;
	}

	public function setOuterId($outerId){
		$this->outerId = $outerId;
		$this->apiParas["outerId"] = $outerId;
	}
	public function setSerialChildProductsList($serialChildProductsList){
		$this->serialChildProductsList = $serialChildProductsList;
		$this->apiParas["serialChildProductsList"] = $serialChildProductsList;
	}

	
}
