<?php
/**
*更新APP使用次数
*/

class SbyUserappUsedCountUpdateRequest {

	private $apiParas = array();
		
	public function getApiParas()
	{
		return $this->apiParas;
	}

	/**使用次数*/
	private  $count; 

	public function getCount(){
		return $this->count;
	}

	public function setCount($count){
		$this->count = $count;
		$this->apiParas["count"] = $count;
	}

	
}
