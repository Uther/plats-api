<?php
/**
 * User: zhangfeng
 * Date: 12-6-13
 * Time: 上午11:47
 */
class WareInfoByInfoRequest extends JosRequest {
	public function getApiMethod() {
		return '360buy.wares.search';
	}
	
	/**
	 *
	 * @param
	 *        	$cid
	 */
	public function setCid($cid) {
		$this->apiParas ['cid'] = $cid;
		return $this;
	}
	public function setEndPrice($endPrice) {
		$this->apiParas ['end_price'] = $endPrice;
		return $this;
	}
	/**
	 *
	 * @param
	 *        	$orderBy
	 */
	public function setOrderBy($orderBy) {
		$this->apiParas ['order_by'] = $orderBy;
		return $this;
	}
	
	/**
	 *
	 * @param
	 *        	$page
	 */
	public function setPage($page) {
		$this->apiParas ['page'] = $page;
		return $this;
	}
	
	/**
	 *
	 * @param
	 *        	$pageSize
	 */
	public function setPageSize($pageSize) {
		$this->apiParas ['page_size'] = $pageSize;
		return $this;
	}
	
	/**
	 *
	 * @param
	 *        	$startPrice
	 */
	public function setStartPrice($startPrice) {
		$this->apiParas ['start_price'] = $startPrice;
		return $this;
	}
	
	/**
	 *
	 * @param
	 *        	$title
	 */
	public function setTitle($title) {
		$this->apiParas ['title'] = $title;
		return $this;
	}
	public function setFields($fields){
	    $this->apiParas['fields']=$fields;
	    return $this;
	}
}