<?php
/**
 * TOP API: taobao.weitao.menu.create request
 * 
 * @author auto create
 * @since 1.0, 2013-12-19 00:00:00
 */
class WeitaoMenuCreateRequest
{
	/** 
	 * 菜单入参
	 **/
	private $menuString;
	
	private $apiParas = array();
	
	public function setMenuString($menuString)
	{
		$this->menuString = $menuString;
		$this->apiParas["menu_string"] = $menuString;
	}

	public function getMenuString()
	{
		return $this->menuString;
	}

	public function getApiMethodName()
	{
		return "taobao.weitao.menu.create";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->menuString,"menuString");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
