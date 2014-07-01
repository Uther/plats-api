<?php
/**
*获取仓库信息
*/

class LogisticsWarehouseInfoGetRequest {

	private $apiParas = array();
		
	public function getApiParas()
	{
		return $this->apiParas;
	}

	/**仓库ID*/
	private  $warehouseId; 

	public function getWarehouseId(){
		return $this->warehouseId;
	}

	public function setWarehouseId($warehouseId){
		$this->warehouseId = $warehouseId;
		$this->apiParas["warehouseId"] = $warehouseId;
	}

	
}
