<?php
/**
 * TOP API: taobao.weitao.fellowlist.query request
 * 
 * @author auto create
 * @since 1.0, 2013-12-12 00:00:00
 */
class WeitaoFellowlistQueryRequest
{
	/** 
	 * 下一页的起始id
	 **/
	private $fromId;
	
	/** 
	 * 页码
	 **/
	private $pageNum;
	
	/** 
	 * 一页大小,最大100
	 **/
	private $pageSize;
	
	private $apiParas = array();
	
	public function setFromId($fromId)
	{
		$this->fromId = $fromId;
		$this->apiParas["from_id"] = $fromId;
	}

	public function getFromId()
	{
		return $this->fromId;
	}

	public function setPageNum($pageNum)
	{
		$this->pageNum = $pageNum;
		$this->apiParas["page_num"] = $pageNum;
	}

	public function getPageNum()
	{
		return $this->pageNum;
	}

	public function setPageSize($pageSize)
	{
		$this->pageSize = $pageSize;
		$this->apiParas["page_size"] = $pageSize;
	}

	public function getPageSize()
	{
		return $this->pageSize;
	}

	public function getApiMethodName()
	{
		return "taobao.weitao.fellowlist.query";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->pageNum,"pageNum");
		RequestCheckUtil::checkNotNull($this->pageSize,"pageSize");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
