<?php
/**
*获取商品系列属性
*/

class SerialProductAttributeGetRequest {

	private $apiParas = array();
		
	public function getApiParas()
	{
		return $this->apiParas;
	}

	/**一号店产品ID（逗号分隔，优先使用）与outerId二选一*/
	private  $productId; 
	/**外部产品ID（逗号分隔）与productId二选一*/
	private  $outerId; 

	public function getProductId(){
		return $this->productId;
	}
	public function getOuterId(){
		return $this->outerId;
	}

	public function setProductId($productId){
		$this->productId = $productId;
		$this->apiParas["productId"] = $productId;
	}
	public function setOuterId($outerId){
		$this->outerId = $outerId;
		$this->apiParas["outerId"] = $outerId;
	}

	
}
