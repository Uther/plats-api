<?php
/**
*查询普通产品信息
*/

class GeneralProductsSearchRequest {

	private $apiParas = array();
		
	public function getApiParas()
	{
		return $this->apiParas;
	}

	/**是否可见(强制上/下架),1是0否*/
	private  $canShow; 
	/**上下架状态0：下架，1：上架*/
	private  $canSale; 
	/**当前页数（默认1）*/
	private  $curPage; 
	/**每页显示记录数（默认50、最大限制：100）*/
	private  $pageRows; 
	/**商家产品中文名称(支持模糊查询)*/
	private  $productCname; 
	/**产品Id列表(最多productId个数为100,与outerIdList二选一，两个都填，默认为prodcuctIdList)*/
	private  $productIdList; 
	/**outerId列表(最多outerId个数为100，与productIdList二选一，两个都填，默认为prodcuctIdList)*/
	private  $outerIdList; 
	/**审核状态[1.未审核(新增未审核,编辑待审核);2.审核通过(审核通过);3.审核失败(审核未通过,图片审核失败,文描审核失败)]*/
	private  $verifyFlg; 
	/**产品类别Id*/
	private  $categoryId; 
	/**产品类别类型（0:1号店类别,1:商家自定义类别,默认为0）*/
	private  $categoryType; 
	/**品牌Id*/
	private  $brandId; 
	/**产品编码列表（逗号分隔）与productIdList、outerIdList三选一,最大长度为100,优先级最低*/
	private  $productCodeList; 

	public function getCanShow(){
		return $this->canShow;
	}
	public function getCanSale(){
		return $this->canSale;
	}
	public function getCurPage(){
		return $this->curPage;
	}
	public function getPageRows(){
		return $this->pageRows;
	}
	public function getProductCname(){
		return $this->productCname;
	}
	public function getProductIdList(){
		return $this->productIdList;
	}
	public function getOuterIdList(){
		return $this->outerIdList;
	}
	public function getVerifyFlg(){
		return $this->verifyFlg;
	}
	public function getCategoryId(){
		return $this->categoryId;
	}
	public function getCategoryType(){
		return $this->categoryType;
	}
	public function getBrandId(){
		return $this->brandId;
	}
	public function getProductCodeList(){
		return $this->productCodeList;
	}

	public function setCanShow($canShow){
		$this->canShow = $canShow;
		$this->apiParas["canShow"] = $canShow;
	}
	public function setCanSale($canSale){
		$this->canSale = $canSale;
		$this->apiParas["canSale"] = $canSale;
	}
	public function setCurPage($curPage){
		$this->curPage = $curPage;
		$this->apiParas["curPage"] = $curPage;
	}
	public function setPageRows($pageRows){
		$this->pageRows = $pageRows;
		$this->apiParas["pageRows"] = $pageRows;
	}
	public function setProductCname($productCname){
		$this->productCname = $productCname;
		$this->apiParas["productCname"] = $productCname;
	}
	public function setProductIdList($productIdList){
		$this->productIdList = $productIdList;
		$this->apiParas["productIdList"] = $productIdList;
	}
	public function setOuterIdList($outerIdList){
		$this->outerIdList = $outerIdList;
		$this->apiParas["outerIdList"] = $outerIdList;
	}
	public function setVerifyFlg($verifyFlg){
		$this->verifyFlg = $verifyFlg;
		$this->apiParas["verifyFlg"] = $verifyFlg;
	}
	public function setCategoryId($categoryId){
		$this->categoryId = $categoryId;
		$this->apiParas["categoryId"] = $categoryId;
	}
	public function setCategoryType($categoryType){
		$this->categoryType = $categoryType;
		$this->apiParas["categoryType"] = $categoryType;
	}
	public function setBrandId($brandId){
		$this->brandId = $brandId;
		$this->apiParas["brandId"] = $brandId;
	}
	public function setProductCodeList($productCodeList){
		$this->productCodeList = $productCodeList;
		$this->apiParas["productCodeList"] = $productCodeList;
	}

	
}
