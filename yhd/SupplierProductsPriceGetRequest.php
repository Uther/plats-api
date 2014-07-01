<?php
/**
*批量查询供应商产品价格信息
*/

class SupplierProductsPriceGetRequest {

	private $apiParas = array();
		
	public function getApiParas()
	{
		return $this->apiParas;
	}

	/**产品id列表，用英文逗号(,)分隔*/
	private  $productIdList; 
	/**供应商ID*/
	private  $supplierId; 

	public function getProductIdList(){
		return $this->productIdList;
	}
	public function getSupplierId(){
		return $this->supplierId;
	}

	public function setProductIdList($productIdList){
		$this->productIdList = $productIdList;
		$this->apiParas["productIdList"] = $productIdList;
	}
	public function setSupplierId($supplierId){
		$this->supplierId = $supplierId;
		$this->apiParas["supplierId"] = $supplierId;
	}

	
}
