<?php
abstract class JosRequest {
	protected $apiParas = array ();
	public function check() {
		//
	}
	abstract function getApiMethod();
	public function getAppJsonParams() {
		ksort ( $this->apiParas );
		if (! $this->apiParas) { // 空对象
			$this->apiParas = new stdClass ();
		}
		return json_encode ( $this->apiParas );
	}
}