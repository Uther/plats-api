<?php
/**
*更新单个产品价格信息
*/

class ProductPriceUpdateRequest {

	private $apiParas = array();
		
	public function getApiParas()
	{
		return $this->apiParas;
	}

	/**1号商城产品ID,与outerId二选一*/
	private  $productId; 
	/**外部产品ID,与productId二选一*/
	private  $outerId; 
	/**1号商城价格*/
	private  $price; 

	public function getProductId(){
		return $this->productId;
	}
	public function getOuterId(){
		return $this->outerId;
	}
	public function getPrice(){
		return $this->price;
	}

	public function setProductId($productId){
		$this->productId = $productId;
		$this->apiParas["productId"] = $productId;
	}
	public function setOuterId($outerId){
		$this->outerId = $outerId;
		$this->apiParas["outerId"] = $outerId;
	}
	public function setPrice($price){
		$this->price = $price;
		$this->apiParas["price"] = $price;
	}

	
}
