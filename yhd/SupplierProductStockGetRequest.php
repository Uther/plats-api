<?php
/**
*批量查询供应商产品库存信息
*/

class SupplierProductStockGetRequest {

	private $apiParas = array();
		
	public function getApiParas()
	{
		return $this->apiParas;
	}

	/**产品id列表，用英文逗号(,)分隔*/
	private  $productIdList; 
	/**供应商ID*/
	private  $suppierId; 
	/**仓库ID*/
	private  $warehouseId; 

	public function getProductIdList(){
		return $this->productIdList;
	}
	public function getSuppierId(){
		return $this->suppierId;
	}
	public function getWarehouseId(){
		return $this->warehouseId;
	}

	public function setProductIdList($productIdList){
		$this->productIdList = $productIdList;
		$this->apiParas["productIdList"] = $productIdList;
	}
	public function setSuppierId($suppierId){
		$this->suppierId = $suppierId;
		$this->apiParas["suppierId"] = $suppierId;
	}
	public function setWarehouseId($warehouseId){
		$this->warehouseId = $warehouseId;
		$this->apiParas["warehouseId"] = $warehouseId;
	}

	
}
