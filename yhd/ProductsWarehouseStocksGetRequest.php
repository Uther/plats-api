<?php
/**
*批量获取产品所有仓库库存信息
*/

class ProductsWarehouseStocksGetRequest {

	private $apiParas = array();
		
	public function getApiParas()
	{
		return $this->apiParas;
	}

	/**1号商城产品ID列表（逗号分隔）与outerIdList二选一,最大长度为100*/
	private  $productIdList; 
	/**外部产品ID列表（逗号分隔）与productIdList二选一,最大长度为100*/
	private  $outerIdList; 

	public function getProductIdList(){
		return $this->productIdList;
	}
	public function getOuterIdList(){
		return $this->outerIdList;
	}

	public function setProductIdList($productIdList){
		$this->productIdList = $productIdList;
		$this->apiParas["productIdList"] = $productIdList;
	}
	public function setOuterIdList($outerIdList){
		$this->outerIdList = $outerIdList;
		$this->apiParas["outerIdList"] = $outerIdList;
	}

	
}
