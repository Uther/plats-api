<?php
/**
*批量查询供应商产品文描信息
*/

class SupplierProductDescriptionGetRequest {

	private $apiParas = array();
		
	public function getApiParas()
	{
		return $this->apiParas;
	}

	/**产品id列表*/
	private  $productIdList; 

	public function getProductIdList(){
		return $this->productIdList;
	}

	public function setProductIdList($productIdList){
		$this->productIdList = $productIdList;
		$this->apiParas["productIdList"] = $productIdList;
	}

	
}
