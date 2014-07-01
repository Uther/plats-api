<?php
/**
*批量提交商品审核
*/

class ProductsVerifySubmitRequest {

	private $apiParas = array();
		
	public function getApiParas()
	{
		return $this->apiParas;
	}

	/**1号商城产品Id列表(逗号分隔),与outerIdList二选一(productIdList优先),相同的产品id做一个产品id处理,最多100条*/
	private  $productIdList; 
	/**外部产品编码列表(逗号分隔),与productIdList二选一,相同的外部产品编码做1个处理,最多100条*/
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
