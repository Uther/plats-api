<?php 
	/*商品下架*/
	function delistingItemUpdate($num_iid)
	{
		include_once("api/ItemUpdateDelistingRequest.php");
		$c = c();
		$req = new ItemUpdateDelistingRequest;
		$req->setNumIid($num_iid);
		$resp = $c->execute($req, SESSIONKEY);
		$res = getObjectVarsFinal($resp);
		return $res;
	}
	/*分销商品获取*/
	function getFenxiaoProducts($p, $s = "up")
	{
		include_once("api/FenxiaoProductsGetRequest.php");
		$c = c();
		$req = new FenxiaoProductsGetRequest;
		$req->setPageNo($p);
		$req->setStatus($s);
		$req->setPageSize(50);
		$resp = $c->execute($req, SESSIONKEY);
		$res = getObjectVarsFinal($resp);
		return $res;
	}
	/*商品上架*/
	function listingItemUpdate($num_iid)
	{
		include_once("api/ItemUpdateListingRequest.php");
		$c = c();
		$req = new ItemUpdateListingRequest;
		$req->setNumIid($num_iid);
		$req->setNum(1);
		$resp = $c->execute($req, SESSIONKEY);
		$res = getObjectVarsFinal($resp);
		return $res;
	}
	/*异步获取会员订单数据*/
	function getTopatsTradesSold($stime,$etime)
	{
		include_once("api/TopatsTradesSoldGetRequest.php");
		$c = c();
		$req = new TopatsTradesSoldGetRequest;
		$req->setFields("seller_nick, buyer_nick, title, type, created, tid, seller_rate, buyer_rate, status, payment, discount_fee, adjust_fee, post_fee, total_fee, pay_time, end_time, modified, consign_time, buyer_obtain_point_fee, point_fee, real_point_fee, received_payment, commission_fee, buyer_memo, seller_memo, alipay_no, buyer_message, pic_path, num_iid, num, price, cod_fee, cod_status, shipping_type, is_daixiao, orders");
		$req->setStartTime($stime);
		$req->setEndTime($etime);
		$resp = $c->execute($req, SESSIONKEY);
		$res = getObjectVarsFinal($resp);
		return $res;
	}
	/*获取会员数据*/
	function getUser($nick = false)
	{
		include_once("api/UserGetRequest.php");
		$c = c();
		$req = new UserGetRequest;
		$req->setFields("user_id,uid,nick,sex,buyer_credit,seller_credit,location,created,last_visit,birthday,type,status,alipay_no,alipay_account,alipay_account,email,consumer_protection,alipay_bind");
		if($nick){
			$req->setNick($nick);
		}
		$resp = $c->execute($req, SESSIONKEY);
		$res = getObjectVarsFinal($resp);
		return $res;
	}
	/*获取买家信息*/
	function getUserBuyer()
	{
		include_once("api/UserBuyerGetRequest.php");
		$c = c();
		$req = new UserBuyerGetRequest;
		$req->setFields("nick,sex");
		$resp = $c->execute($req, SESSIONKEY);
		$res = getObjectVarsFinal($resp);
		return $res;
	}
	/*优惠券推送*/
	function sendPromotionCoupon($nick,$id)
	{
		include_once("api/PromotionCouponSendRequest.php");
		$c = c();
		$req = new PromotionCouponSendRequest;
		$req->setCouponId($id);
		$req->setBuyerNick($nick);
		$resp = $c->execute($req, SESSIONKEY);
		$res = getObjectVarsFinal($resp);
		return $res;
	}
	/*商品信息修改*/
	function updateItem($num_iid, $sell_point=false, $sub_stock=false, $title=false)
	{
		include_once("api/ItemUpdateRequest.php");
		$c = c();
		$req = new ItemUpdateRequest;
		$req->setNumIid($num_iid);
		/*卖点*/
		if($sell_point)
		{
			$req->setSellPoint($sell_point);
		}
		/*减库存方式1拍下2付款*/
		if($sub_stock)
		{
			$req->setSubStock($sub_stock);
		}
		/*改标题*/
		if($title)
		{
			$req->setTitle($title);
		}
		$resp = $c->execute($req, SESSIONKEY);
		$res = getObjectVarsFinal($resp);
		return $res;
	}
	/* 主图上传*/
	function uploadItemImg($num_iid,$files){
		include_once("api/ItemImgUploadRequest.php");
		$c = c();
		$req = new ItemImgUploadRequest;
		//$req->setId(12345);
		$req->setNumIid($num_iid);
		$req->setPosition(1);
		//附件上传的机制参见PHP CURL文档，在文件路径前加@符号即可
		$req->setImage($files);
		$req->setIsMajor("true");
		$resp = $c->execute($req, SESSIONKEY);
		$res = getObjectVarsFinal($resp);
		return $res;
	}
	/*获取会员数据*/
	function getCrmMembersIncrement($stime, $p)
	{
		include_once("api/CrmMembersIncrementGetRequest.php");
		$c = c();
		$req = new CrmMembersIncrementGetRequest;
		$req->setStartModify($stime);
		$req->setPageSize(100);
		$req->setCurrentPage($p);
		$resp = $c->execute($req, SESSIONKEY);
		$res = getObjectVarsFinal($resp);
		return $res;
	}
	/*获取任务结果*/
	function getTopatsResult($task_id)
	{
		include_once("api/TopatsResultGetRequest.php");
		$c = c();
		$req = new TopatsResultGetRequest;
		$req->setTaskId($task_id);
		$resp = $c->execute($req);
		$res = getObjectVarsFinal($resp);
		return $res;
	}
	/*获取在售商品列表*/
	function getItemsOnsale($p)
	{
		include_once("api/ItemsOnsaleGetRequest.php");
		$c = c();
		$req = new ItemsOnsaleGetRequest;
		$req->setFields("num_iid,price,pic_url,outer_id");
		$req->setPageNo($p);
		$req->setOrderBy("list_time:desc");
		$req->setPageSize(100);
		$resp = $c->execute($req, SESSIONKEY);
		$res = getObjectVarsFinal($resp);
		return $res;
	}
	/*获取库存商品列表*/
	function getItemsInventory($p)
	{
		include_once("api/ItemsInventoryGetRequest.php");
		$c = c();
		$req = new ItemsInventoryGetRequest;
		$req->setFields("num_iid,price,pic_url,outer_id");
		$req->setPageNo($p);
		$req->setPageSize(100);
		$req->setOrderBy("list_time:desc");
		$resp = $c->execute($req, SESSIONKEY);
		$res = getObjectVarsFinal($resp);
		return $res;
	}
	/*根据num_iid获取skus[]*/
	function getItemsList($iids)
	{
		include_once("api/ItemsListGetRequest.php");
		$c = c();
		$req = new ItemsListGetRequest;
		$req->setFields("num_iid,title,sku.sku_id,sku.outer_id,sku.quantity,price");
		$req->setNumIids($iids);
		$resp = $c->execute($req, SESSIONKEY);
		$res = getObjectVarsFinal($resp);
		return $res;
	}
	/*获取促销信息*/
	function getUmpPromotion($num_iid)
	{
		include_once("api/UmpPromotionGetRequest.php");
		$c = c();
		$req = new UmpPromotionGetRequest;
		$req->setItemId($num_iid);
		$resp = $c->execute($req, SESSIONKEY);
		$res = getObjectVarsFinal($resp);
		return $res;
	}
	
	
	/*根据num_iid,sku更新库存*/
	function updateItemQuantity($n, $s, $q)
	{
		include_once("api/ItemQuantityUpdateRequest.php");
		$c = c();
		$req = new ItemQuantityUpdateRequest;
		$req->setNumIid($n);
		$req->setSkuId($s);
		$req->setQuantity($q);
		$req->setType(1);
		$resp = $c->execute($req, SESSIONKEY);
		$res = getObjectVarsFinal($resp);
		return $res;
	}
	/*根据outer_id获取num_iid和sku_id*/
	function getItemsCustom($sku)
	{
		include_once("api/ItemsCustomGetRequest.php");
		$c = c();
		$req = new ItemsCustomGetRequest;
		$req->setOuterId($sku);
		$req->setFields("num_iid,sku.sku_id,sku.outer_id");
		$resp = $c->execute($req, SESSIONKEY);
		$res = getObjectVarsFinal($resp);
		return $res;
	}

	/* 增量入库 */
	function getTradesSoldIncrement($stime, $etime, $p, $t = true)
	{
		include_once("api/TradesSoldIncrementGetRequest.php");
		$c = c();
		$req = new TradesSoldIncrementGetRequest;
		$req->setFields("seller_nick, buyer_nick, title, type, created, tid, seller_rate,seller_can_rate, buyer_rate,can_rate,status, payment, discount_fee, adjust_fee, post_fee, total_fee, pay_time, end_time, modified, consign_time, buyer_obtain_point_fee, point_fee, real_point_fee, received_payment,pic_path, num_iid, num, price, cod_fee, cod_status, shipping_type, receiver_name, receiver_state, receiver_city, receiver_district, receiver_address, receiver_zip, receiver_mobile, receiver_phone,alipay_id,alipay_no,is_lgtype,is_force_wlb,is_brand_sale,has_buyer_message,credit_card_fee,step_trade_status,step_paid_fee,mark_desc,send_time,,has_yfx,yfx_fee,yfx_id,yfx_type,trade_source,seller_flag,is_daixiao,is_part_consign,orders");
		if($t)
		{
			$req->setStartModified($stime);
			$req->setEndModified($etime);
		}
		else
		{
			$req->setStartCreate($stime);
			$req->setEndCreate($etime);
		}
		$req->setStatus("TRADE_FINISHED");
		$req->setExtType("service");
		$req->setPageNo($p);
		$req->setPageSize(100);
		$resp = $c->execute($req, SESSIONKEY);
		$res = getObjectVarsFinal($resp);
		return $res;
	}
	/* 获取京东在售商品列表 */
	function getWareListing($p)
	{
		include_once("request/WareListingGetRequest.php");
		$j = j();
		$req = new WareListingGetRequest();
		$req->setPage($p);
		$req->setPageSize(50);
		$resp = $j->execute($req, SESSIONKEY);
		$res = getObjectVarsFinal($resp);
		return $res;
	}
	/* 京东获取仓库商品列表 */
	function getWareDelisting($p)
	{
		include_once("request/WareDelistingGetRequest.php");
		$j = j();
		$req = new WareDelistingGetRequest();
		$req->setPage($p);
		$req->setPageSize(100);
		$resp = $j->execute($req, SESSIONKEY);
		$res = getObjectVarsFinal($resp);
		return $res;
	}
	/*京东获取SKU信息*/
	function getWareSkus($v)
	{
		include_once("request/WareSkusGetRequest.php");
		$j = j();
		$req = new WareSkusGetRequest();
		$req->setWareIds($v);
		$req->setFields('sku_id,ware_id,stock_num,jd_price,market_price,color_value,size_value,outer_id');
		$resp = $j->execute($req, SESSIONKEY);
		$res = getObjectVarsFinal($resp);
		return $res;
	}
	/*拍拍获取SKU信息*/
	function listsellerSearchItem($page=1,$status=1)
	{
		$p = p();
		$p->setApiPath("/item/sellerSearchItemList.xhtml");
	    $pa = &$p->getParams();
		$pa["sellerUin"] = UIN;
		$pa['pageSize'] = "100";
		$pa['itemState'] = $status;
		$pa['pageIndex'] = $page;
		$resp = $p->invoke();
		$a = explode('sellerSearchItemListSuccess(', $resp);
		$b = explode(');}catch', $a[1]);
		return getObjectVarsFinal(json_decode($b[0]));exit;
	}
	/*一号店获取SKU信息*/
	function getProductsStock()
	{
		include_once("yhd/ProductsStockGetRequest.php");
		$o = o();
		$on = new YhdClient;
		$on->setGatewayUrl("http://openapi.yhd.com/app/api/rest/router?");
		$req = new ProductsStockGetRequest();
		$resp = $on->execute($o->getApiParas(), $req->getApiParas(),array(),SESSIONKEY);
		var_dump($resp).die;
		$res = getObjectVarsFinal($resp);
		return $res;
	}
	/*库存同步*/
	function updateWareSkuStock($num_iid, $num)
	{
		include_once("request/WareSkuStockUpdateRequest.php");
		$j = j();
		$req = new WareSkuStockUpdateRequest();
		$req->setQuantity($num);
		$req->setSkuId($num_iid);
		$resp = $j->execute($req, SECRETKEY);
		$res = getObjectVarsFinal($resp);
		return $res;
	}
	/*object转array*/
	function getObjectVarsFinal($obj)
    {
        if (is_object($obj)) {
            $obj = get_object_vars($obj);
        }
        if (is_array($obj)) {
            foreach ($obj as $key => $value) {
                $obj[$key] = getObjectVarsFinal($value);
            }
        }
        return $obj;
    }
    function c(){
    	$c = new TopClient;
		$c->appkey = APPKEY;
		$c->secretKey = SECRETKEY;
		return $c;
    }
    function j()
    {
    	$j = new JosClient;
		$j->appkey = APPKEY;
		$j->secretKey = SECRETKEY;
		return $j;
    }
    function p()
    {
    	$p = new PaiPaiOpenApiOauth(APPKEY, SECRETKEY, SESSIONKEY, UIN);
    	return $p;
    }
    function o()
    {
    	$o = new SysParamsRequest;
		$o->appkey = APPKEY;
		$o->secretKey = SECRETKEY;
		return $o;
    }
?>