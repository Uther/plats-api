<?php 
	include("config.php");
	include("t.php");
	
	$f = isset($_REQUEST['func']) ? $_REQUEST['func'] : " ";
	/*1拍下减库存，2付款减库存*/
	$m = isset($_REQUEST['model']) ? $_REQUEST['model'] : 1;
	
	$a = isset($_REQUEST['act']) ? $_REQUEST['act'] : 2;
	
	$s = isset($_REQUEST['status']) ? $_REQUEST['status'] : "up";
	
	$t = isset($_REQUEST['table']) ? $_REQUEST['table'] : "point";
	
	$stamp = time();
	mysql_query("INSERT INTO `api_log` VALUES('".$stamp."','".$b."','".$f."','".$m."','".$a."','".$s."','".getIP()."','".date("Y-m-d H:i:s",time()+28800)."','')");
	
	if($a == 2)
	{
		exit("该功能请联系IT协助使用");
	}
	/*功能表*/
	define("TABLE",$f.'_'.$b);
	/*插入记录表*/
	define("TABLE_I",$t.'_'.$b);
	/*左联表，基础信息表*/
	define("TABLE_L","com_".$b);
	/*记录表*/
	define("TABLE_R",$f);
	
	/*拍下减库存方式 num_iid,status */
	if($f == "sub")
	{
		//$res = mysql_query("SELECT b.num_iid,a.sn FROM ".TABLE." a LEFT JOIN ".TABLE_L." b on a.sn=b.sn WHERE a.status != '".$m."' ");
		$res = mysql_query("SELECT `sn` FROM ".TABLE." WHERE `status` != '".$m."' ");
		while($v = mysql_fetch_row($res))
		{
			$re = updateItem($v[0], false, $m);
			if(isset($re['code']))
			{
				var_dump($re);
				echo $v[0]."<br>";
			}else
			{
				mysql_query("UPDATE ".TABLE." SET `status`='".$m."' WHERE `sn`='".$v[0]."' LIMIT 1");
			}
		}
		theEnd($stamp);
		exit;
	}
	/*卖点 num_iid,status */
	elseif($f == "point")
	{
		if($b == 'kids')
		{
			$thePoint = "全店两件包邮，夏装6折尝鲜，买两件即享5折";
		}elseif($b == 'gxg')
		{
			$thePoint = ".";
		}elseif($b == '1978')
		{
			$thePoint = "春装热卖4-6折，两件包邮！先领取再购物：满328-20，满599-50，满999-100。让我们将每一个自我都化作艺术的符号完美呈现，2014发现另一个自己！";
		}else
		{
			$thePoint = ".";
		}
		$res = mysql_query("SELECT b.num_iid,a.points,a.sn FROM ".TABLE." a LEFT JOIN ".TABLE_L." b on a.sn=b.sn WHERE a.status != 1 ");
		//$res = mysql_query("SELECT `sn`,`points` FROM ".TABLE." WHERE status != 1");
		while($v = mysql_fetch_row($res))
		{
			$re = updateItem($v[0], $thePoint);
			if(isset($re['code']))
			{
				var_dump($re);
				echo $v[0]."<br>";
			}else
			{
				mysql_query("UPDATE ".TABLE." SET `status`='1' WHERE `sn`='".$v[2]."' LIMIT 1");
			}
		}
		theEnd($stamp);
		exit;
	}
	/*优惠券发放*/
	elseif($f == "send")
	{
		/*$rs = new PDO('mysql:host=192.168.8.251;dbname=wtao','root','gxghuang');
		$res = $rs->query("SELECT * FROM `tit_gxg` WHERE `sn`='35391078604' LIMIT 1");
		$row = $res->fetch();
		if($row)
		{
			print_r($row).die;
		}else
		{
			$rs = new PDO('mysql:host=192.168.8.251;dbname=1111','root','gxghuang');
			$res = $rs->query("SELECT * FROM `tit_gxg` ORDER BY RAND() LIMIT 3");
			while($row = $res->fetch())
			{
				$arr[] = $row;
			}
			print_r($arr).die;
		}
		
		while($row = $res->fetch())
		{
			if($row)
			{
				echo 111;
				print_R($row);
			}else{
				echo 222;
			}
			echo 333;
		}
		echo 444;*/
		
		/*$r1 = addPromotionCoupon("3","0","2014-01-26 00:00:00","2014-02-14 23:59:59");
		$r2 = addPromotionCoupon("5","0","2014-01-26 00:00:00","2014-02-14 23:59:59");
		print_R($r1);print_R($r2);*/
		http://gxg1978.we.app.jae.m.taobao.com/index/uther.php?act=test&seller_nick=gxg1978%E6%97%97%E8%88%B0%E5%BA%97&sns_id=2067498121&nick=放03iUHuZW0t0YmiBvawoeMtLPVlPwiamcZHCURfOPrbVL5VO56TiqmKT4AeNK+wDntb
		//$arr = array("10"=>"99302134","20"=>"99232143","50"=>"99196158","100"=>"99256155","3"=>"99192459","5"=>"99226439");
		$r6 = sendPromotionCouponSns("101450065","放03iUHuZW0t0YmiBvawoeMtLPVlPwiamcZHCURfOPrbVL5VO56TiqmKT4AeNK+wDntb");
		print_r($r6).die;
		//$r5 = sendPromotionCouponSns("99196158","q01GLZPQn84fGe4HLWpsfRsQ2MAESw3U35t+ASd0SOXQCA=");
		//$r4 = sendPromotionCouponSns("99232143","q01i9jBHtYu0jf75rBZycZeyggcTEqrPF3WAdUBY9OZio4=");
		//$r = sendPromotionCouponSns("99302134","骄01A09Z3GrLAW+80FZkW+MsSQUKAeZDLKA+p4Ec15tDHsc=");
		/*if(isset($r['failure_buyers']))
		{
			print_r($r['failure_buyers']);
			echo $r['failure_buyers']['error_message']['reason'];
		}*/
		//print_r($r);
	}
	/*app商品信息批量获取*/
	elseif($f == "app")
	{
		$size = array('28'=>'165-84-S',
					  '29'=>'170-88-M',
					  '30'=>'175-92-L',
					  '31'=>'180-96-XL',
					  '32'=>'185-100-XXL',
					  '33'=>'190-84-XXXL',
					  '46'=>'165-84-S',
					  '48'=>'170-88-M',
					  '50'=>'175-92-L',
					  '52'=>'180-96-XL',
					  '54'=>'185-100-XXL',
					  '56'=>'190-84-XXXL',
					  '38'=>'38码',
					  '39'=>'39码',
					  '40'=>'40码',
					  '41'=>'41码',
					  '42'=>'42码',
					  '00'=>'饰品');
		$res = mysql_query("SELECT b.sn,b.num_iid FROM `gxg_goods` a left join ".TABLE_L." b on a.goods_sn=b.sn");
		while($v = mysql_fetch_row($res))
		{
			$infos = getItemsList($v[1]);
			if(isset($info['code']))
			{
				if($infos['code'] != '530')
				{
					echo $v['num_iid']."<br>";
					var_dump($infos);
				}
			}else
			{
				$info = $infos['items']['item'];
				$sku = $info['skus']['sku'];
				if($info['outer_id'] == $v[0])
				{
					$data['category_id'] = substr($info['outer_id'],3,2);
					$data['price'] = $data['integration'] = $data['salePrice'] = $info['price'];
					$data['goods_name'] = $info['title'];
					$data['stock'] = $info['num'];
					$data['modify_time'] = $data['start'] = $data['end'] = date('Y-m-d H:i:s');
					$props = explode(";",$info['props_name']);
					foreach($props as $kk=>$vv)
					{
						$prop = explode(":",$vv);
						if(in_array('细分风格',$prop))
						{
							$data['style'] = end($prop);
						}elseif(in_array('材质',$prop))
						{
							$data['fabric'] = end($prop);
						}elseif(in_array('基础风格',$prop))
						{
							$data['goods_desc'] = end($prop);
						}
					}
					$i=0;
					foreach($sku as $kkk=>$vvv)
					{
						$skus[$i]['color_id'] = substr($vvv['outer_id'],8,3);
						$skus[$i]['size_id'] = $size[substr($vvv['outer_id'],-2,2)];
						$skus[$i]['sku'] = $vvv['outer_id'];
						$skus[$i]['stock'] = $vvv['quantity'];
						$skus[$i]['goods_sn'] = $v[0];
						$i++;
					}
					insertGoods($data,$v[0]);
					insertSkus($skus,$v[0]);
				}
			}
		}
	}
	elseif($f == "confirm")
	{
		$res = mysql_query("SELECT * FROM `send` WHERE `status`=0");
		while($row = mysql_fetch_row($res))
		{
			$r = sendLogisticsOnline($row[1],$row[2],strtoupper($row[3]));
			if($r['shipping']['is_success'] == TRUE)
			{
				mysql_query("UPDATE `send` SET `status`=1 WHERE `order_sn`='".$row[0]."' LIMIT 1");
			}else
			{
				echo $row[1];
				var_dump($r);
			}
		}
	}
	elseif($f == "nick")
	{
		$res = searchCrmMembers("放猪小难");
		if($res['total_result'] == 1)
		{
			return true;
		}else
		{
			return false;
		}
		print_r($res).die;
	}
	/*获取促销价*/
	elseif($f == "ump")
	{
		if($m == 1){
			mysql_query("TRUNCATE TABLE ".TABLE." ");
			$pages = getItemsOnsale(1);
			$num = ($pages['total_results'] % 100) > 0 ? ceil($pages['total_results'] / 100) : floor($pages['total_results'] / 100);
			foreach($pages['items']['item'] as $k=>$v)
			{
				
				mysql_query("INSERT INTO ".TABLE." (`sn`,`num_iid`,`price`,`ump`) VALUES('".$v['outer_id']."','".$v['num_iid']."','".$v['price']."','".getUmp($v['num_iid'])."')");
			}
			for($i=2; $i<=$num; $i++)
			{
				$items = getItemsOnsale($i);
				foreach($items['items']['item'] as $k=>$v)
				{
					mysql_query("INSERT INTO ".TABLE." (`sn`,`num_iid`,`price`,`ump`) VALUES('".$v['outer_id']."','".$v['num_iid']."','".$v['price']."','".getUmp($v['num_iid'])."')");
				}
			}
			$res = mysql_query("SELECT `sn` FROM ".TABLE." WHERE `ump`='' ");
			$html = '';
			$i=0;
			while($r = mysql_fetch_row($res))
			{
				$i++;
				$html.= $r[0]."<br>";
			}
			echo "还有".$i."款未获取促销价,请再次增量抓取,如数字不变请逐条检查<br>".$html;
			theEnd($stamp);
			exit;
		}elseif($m == 2){
			$res = mysql_query("SELECT `num_iid` FROM ".TABLE." WHERE `ump`='' ");
			while($r = mysql_fetch_row($res))
			{
				mysql_query("UPDATE ".TABLE." SET `ump`='".getUmp($r[0])."' WHERE `num_iid`='".$r[0]."' LIMIT 1");
			}
			$res = mysql_query("SELECT `sn` FROM ".TABLE." WHERE `ump`='' ");
			$html = '';
			$i=0;
			while($r = mysql_fetch_row($res))
			{
				$i++;
				$html.= $r[0]."<br>";
			}
			echo "还有".$i."款未获取促销价,请再次增量抓取,如数字不变请逐条检查<br>".$html;
			theEnd($stamp);
			exit;
		}elseif($m == 3)
		{
			echo '款号,商品ID,吊牌价,促销价<br>';
			$res = mysql_query("SELECT * FROM ".TABLE." ");
			while($r = mysql_fetch_row($res))
			{
				echo implode(',', $r)."<br>";
			}
			theEnd($stamp);
			exit;
		}
	}
	/*主图上传 sn,num_iid,status */
	elseif($f == "mark")
	{
		$url = "@D:/wamp/www/api/taobao/".$b."/";
		
		$res = mysql_query("SELECT a.sn,b.num_iid FROM ".TABLE." as a LEFT JOIN ".TABLE_L." b on a.sn=b.sn WHERE a.status != 1 ");
		while($v = mysql_fetch_row($res))
		{
			$dirs = $url.$v[0].".jpg";
			$dd = str_replace("/","\\",$dirs);
			$re = uploadItemImg($v[1],$dd);
			if(isset($re['code']))
			{
				var_dump($re);
				echo $v[1]."<br>";
			}else
			{
				mysql_query("UPDATE ".TABLE." SET `status`='1' WHERE `sn`='".$v[0]."' LIMIT 1");
			}
		}
		theEnd($stamp);
		exit;
	}
	/*上架 num_iid,status */
	elseif($f == "online")
	{
		$res = mysql_query("SELECT b.num_iid,a.sn FROM ".TABLE." a LEFT JOIN ".TABLE_L." b on a.sn=b.sn WHERE a.status != 1 ");
		while($v = mysql_fetch_row($res))
		{
			$re = listingItemUpdate($v[0]);
			if(isset($re['code']))
			{
				var_dump($re);
				echo $v[0]."<br>";
			}else
			{
				mysql_query("UPDATE ".TABLE." SET `status`=1 WHERE `sn`='".$v[1]."' LIMIT 1");
			}
		}
		theEnd($stamp);
		exit;
	}
	/*下架 num_iid,status */
	elseif($f == "offline")
	{
		//$res = mysql_query("SELECT b.num_iid,a.sn FROM ".TABLE." a LEFT JOIN ".TABLE_L." b on a.sn=b.sn WHERE a.status !=2 ");
		$res = mysql_query("SELECT sn FROM ".TABLE."  WHERE status !=2 ");
		while($v = mysql_fetch_row($res))
		{
			$re = delistingItemUpdate($v[0]);
			if(isset($re['code']))
			{
				var_dump($re);
				echo $v[0]."<br>";
			}else
			{
				mysql_query("UPDATE ".TABLE." SET `status`=2 WHERE `sn`='".$v[0]."' LIMIT 1");
			}
		}
		theEnd($stamp);
		exit;
	}
	elseif($f == "tit")
	{
		//$res = mysql_query("SELECT b.num_iid,a.title,a.sn FROM ".TABLE." a LEFT JOIN ".TABLE_L." b on a.sn=b.sn WHERE a.status != 1 ");
		$res = mysql_query("SELECT sn,title FROM ".TABLE." WHERE status != 1 ");
		while($v = mysql_fetch_row($res))
		{
			$re = updateItem($v[0], false, false, $v[1]);
			if(isset($re['code']))
			{
				echo $v[0]."<br>";
				var_dump($re);
			}else
			{
				mysql_query("UPDATE ".TABLE." SET `status`=1 WHERE `sn`='".$v[0]."' LIMIT 1");
			}
		}
		theEnd($stamp);
		exit;
	}
	/*在售库存 */
	elseif($f == "onsale")
	{
		$pages = getItemsOnsale(1);
		$num = ($pages['total_results'] % 100) > 0 ? ceil($pages['total_results'] / 100) : floor($pages['total_results'] / 100);
		if($m == 1)
		{
			echo "商品ID,SKU,数量<br>";
			echoStock($pages['items']['item']);
		}else
		{
			echo "款号,商品ID,S/38,M/39,L/40,XL/41,XXL/42,XXXL/43,44,库存,吊牌价,促销价,SKU<br>";
			echoTCom($pages['items']['item']);
		}
		for($i=2; $i<=$num; $i++)
		{
			$items = getItemsOnsale($i);
			if($m == 1)
			{
				echoStock($items['items']['item']);
			}else
			{
				echoTCom($items['items']['item']);
			}
		}
		theEnd($stamp);
		exit;
	}
	/*仓库中库存*/
	elseif($f == "Inventory")
	{
		$pages = getItemsInventory(1);
		$num = ($pages['total_results'] % 100) > 0 ? ceil($pages['total_results'] / 100) : floor($pages['total_results'] / 100);
		echoStock($pages['items']['item']);
		for($i=2; $i<=$num; $i++)
		{
			$items = getItemsInventory($i);
			echoStock($items['items']['item']);
		}
		theEnd($stamp);
		exit;
	}
	/*分销sn价格获取*/
	elseif($f == "fenxiao")
	{
		$pages = getFenxiaoProducts(1, $s);
		
		$num = ($pages['total_results'] % 50) > 0 ? ceil($pages['total_results'] / 50) : floor($pages['total_results'] / 50);
		echo 'sn,sku,store,low_price,hign_price<br>';
		echoProduct($pages['products']['fenxiao_product']);
		for($i=2; $i<=$num; $i++)
		{
			$items = getFenxiaoProducts($i, $s);
			echoProduct($items['products']['fenxiao_product']);
		}
		theEnd($stamp);
		exit;
	}
	/*通用信息获取*/
	elseif($f == "com")
	{
		if($m == 2)
		{
			mysql_query("TRUNCATE TABLE ".TABLE_I." ");
		}
		$pages = getItemsOnsale(1);
		$num = ($pages['total_results'] % 100) > 0 ? ceil($pages['total_results'] / 100) : floor($pages['total_results'] / 100);
		addStock($pages['items']['item'],$m);
		for($i=2; $i<=$num; $i++)
		{
			$items = getItemsOnsale($i);
			addStock($items['items']['item'],$m);
		}
		if($m == 1){
			$pages = getItemsInventory(1);
			$num = ($pages['total_results'] % 100) > 0 ? ceil($pages['total_results'] / 100) : floor($pages['total_results'] / 100);
			addStock($pages['items']['item']);
			for($i=2; $i<=$num; $i++)
			{
				$items = getItemsInventory($i);
				addStock($items['items']['item']);
			}
		}
		theEnd($stamp);
		exit;
	}
	/************************	京东接口集合	**************************/
	/*京东在售库存*/
	elseif($f == "jdup")
	{
		//https://auth.360buy.com/oauth/authorize?response_type=code&client_id=C6ADB2FD28397412A4CE554677F5A6F9&redirect_uri=http://115.238.188.14&state=007
		//https://auth.360buy.com/oauth/token?grant_type=authorization_code&client_id=C6ADB2FD28397412A4CE554677F5A6F9&redirect_uri=http://115.238.188.14&code=bWXBXp&state=12345&client_secret=ec085acebf50492c8679feb8bc61231a
		echo "款号,S/38,M/39,L/40,XL/41,XXL/42,XXXL/43,44,库存,吊牌价,SKU<br>";
		$pages = getWareListing(1);
		$num = ($pages['total'] % 50) > 0 ? ceil($pages['total'] / 50) : floor($pages['total'] / 50);
		echoJd($pages['ware_infos']);
		for($i=2; $i<=$num; $i++)
		{
			$items = getWareListing($i, $s);
			if($items['code'] != '0')
			{
				var_dump($items).die;
			}else
			{
				echoJd($items['ware_infos']);
			}
			
		}
		theEnd($stamp);
		exit;
	}
	/*京东仓库库存*/
	elseif($f == "jddown")
	{
		echo "款号,S/38,M/39,L/40,XL/41,XXL/42,XXXL/43,44,库存,吊牌价,SKU<br>";
		$pages = getWareDelisting(1);
		$num = ($pages['total'] % 100) > 0 ? ceil($pages['total'] / 100) : floor($pages['total'] / 100);
		echoJd($pages['ware_infos']);
		for($i=2; $i<=$num; $i++)
		{
			$items = getWareDelisting($i, $s);
			echoJd($items['ware_infos']);
		}
		theEnd($stamp);
		exit;
	}
	/**********************		拍拍接口集合	***********************/
	/*拍拍库存获取*/
	elseif($f == "paipai")
	{
		/* model  1在售2仓库 */
		echo "商品id,吊牌价,拍拍售价,SKU,库存<br>";
		$pages = listsellerSearchItem(1,$m);
		$num = ($pages['countTotal'] % 100) > 0 ? ceil($pages['countTotal'] / 100) : floor($pages['countTotal'] / 100);
		echoPop($pages['itemList']);
		for($i=2; $i<=$num; $i++)
		{
			$items = listsellerSearchItem($i, $m);
			echoPop($items['itemList']);
		}
		theEnd($stamp);
		exit;
	}
	/**********************		一号店接口集合	***********************/
	elseif($f == "1shop")
	{
		$res = getProductsStock();
	}
	function getUmp($iid)
	{
		$ump = getUmpPromotion($iid);
		$ump_price = @$ump['promotions']['promotion_in_item']['promotion_in_item']['item_promo_price'];
		if($ump_price == '')
		{
			$num1 = count(@$ump['promotions']['promotion_in_item']['promotion_in_item']);
			$ump_price = @$ump['promotions']['promotion_in_item']['promotion_in_item'][$num1-1]['item_promo_price'];
		}
		if($ump_price == '')
		{
			$num2 = count(@$ump['promotions']['promotion_in_item']['promotion_in_item']['item_promo_price']['sku_price_list']['price']);
			$ump_price = @$ump['promotions']['promotion_in_item']['promotion_in_item']['item_promo_price']['sku_price_list']['price'][$num2-1];
		}
		
		return $ump_price;
	}
	/*京东库存信息输出*/
	function echoJd($items)
	{
		$dot[1] = ',,,,,,,';
		$dot[2] = ',,,,,,';
		$dot[3] = ',,,,,';
		$dot[4] = ',,,,';
		$dot[5] = ',,,';
		$dot[6] = ',,';
		$dot[7] = ',';
		foreach($items as $k=>$v)
		{
			$res = getWareSkus($v['ware_id']);
			if($res['code'] != '0')
			{
				if($res['code'] != '502')
				{
					var_dump($res).die;
				}
			}else
			{
				$attr = array();
				$skus = array();
				foreach($res['skus'] as $kk=>$vv)
				{
					$attr[substr($vv['outer_id'],-5,3)][substr($vv['outer_id'],-2,2)] = $vv['stock_num'];
					$skus[substr($vv['outer_id'],-5,3)][substr($vv['outer_id'],-2,2)] = $vv['outer_id'];
				}
				foreach($attr as $jj=>$yy)
				{
					
					ksort($yy);
					ksort($skus[$jj]);
					
					if(count($yy) == 1)
					{
						echo $v['item_num'].',,,,,,,,'.$v['stock_num'].",".$v['jd_price'].",".implode("/", $skus[$jj])."<br>";
					}else
					{
						echo $v['item_num'].",".implode(',', $yy).$dot[count($yy)].$v['stock_num'].",".$v['jd_price'].",".implode("/", $skus[$jj])."<br>";
					}
				}
			}
		}
	}
	function echoTCom($item)
	{
		$arr = array();
		$dot[1] = ',,,,,,,';
		$dot[2] = ',,,,,,';
		$dot[3] = ',,,,,';
		$dot[4] = ',,,,';
		$dot[5] = ',,,';
		$dot[6] = ',,';
		$dot[7] = ',';
		foreach($item as $k=>$v)
		{
			
			$skus = getItemsList($v['num_iid']);
			if(isset($skus['code']))
			{
				if($skus['code'] != '530')
				{
					echo $v['num_iid']."<br>";
					var_dump($skus);
				}
			}else
			{
				if(isset($skus['items']['item']['skus']))
				{
					$sku = $skus['items']['item']['skus']['sku'];
					if(isset($sku[0]))
					{
						$sn = @substr($v['outer_id'],0,8);
						$attr = array();
						$tbs = array();
						foreach($sku as $kk=>$vv)
						{
							if(isset($vv['outer_id']))
							{
								$attr[@substr($vv['outer_id'],-5,3)][@substr($vv['outer_id'],-2,2)] = $vv['quantity'];
								$tbs[@substr($vv['outer_id'],-5,3)][@substr($vv['outer_id'],-2,2)] = $vv['outer_id'];
							}
						}
						foreach($attr as $jj=>$yy)
						{
							
							ksort($yy);
							ksort($tbs[$jj]);
							if(count($yy) == 1)
							{
								echo $sn.",".$v['num_iid'].','.',,,,,,,'.array_sum($yy).",".$v['price'].",".@implode("/", $tbs[$jj])."<br>";
							}else
							{
								echo $sn.",".$v['num_iid'].",".implode(',', $yy).$dot[count($yy)].array_sum($yy).",".$v['price'].",".implode("/", $tbs[$jj])."<br>";
							}
						}
					}else{
						$sn = substr($sku['outer_id'],0,8);
						echo $sn.",".$v['num_iid'].",".",,,,,,,".$sku['quantity'].",".$v['price'].",".$v['outer_id']."<br>";
					}
				}
			}
		}
	}
	/*拍拍库存信息输出*/
	function echoPop($pops)
	{
		foreach($pops as $k=>$v)
		{
			if(isset($v['stockList']))
			{
				foreach($v['stockList'] as $kk=>$vv)
				{
					echo $v['itemCode'].",".$v['marketPrice'].",".$v['itemPrice'].",".$vv['stockLocalCode'].",".$vv['stockCount']."<br>";
				}
			}
		}
	}
	/*更新库存对应表*/
	function addStock($item,$m = 1)
	{
		foreach($item as $k=>$v)
		{
			if($m == 1)
			{
				$res = mysql_query("SELECT `sn`,`num_iid` FROM ".TABLE." WHERE `num_iid`= '".$v['num_iid']."' LIMIT 1");
				$r = mysql_fetch_row($res);
				$v['outer_id'] = is_array($v['outer_id']) ? 'Array' : $v['outer_id'];
				if(!$r)
				{
					mysql_query("INSERT INTO ".TABLE." VALUES('".$v['outer_id']."','".$v['num_iid']."')");
				}elseif($r[0] != $v['outer_id'])
				{
					mysql_query("UPDATE ".TABLE." SET `sn`='".$v['outer_id']."' WHERE `num_iid`='".$v['num_iid']."' LIMIT 1");
					echo $r[0].$r[1]."<br>";
				}
			}elseif($m == 2)
			{
				mysql_query("INSERT INTO ".TABLE_I." (`sn`) VALUES('".$v['outer_id']."')");
			}
		}
	}
	/*分销库存信息输出*/
	function echoProduct($products)
	{
		foreach($products as $k=>$v)
		{
			foreach($v['skus']['fenxiao_sku'] as $kk=>$vv)
			{
				echo $v['outer_id'].",".@$vv['outer_id'].",".@$vv['quantity'].",".$v['retail_price_low'].",".$v['retail_price_high']."<br>";
			}
		}
	}
	/*天猫库存信息输出*/
	function echoStock($item)
	{
		foreach($item as $k=>$v)
		{
			$skus = getItemsList($v['num_iid']);
			if(isset($skus['code']))
			{
				if($skus['code'] != '530')
				{
					var_dump($skus);
				}
			}else
			{
				if(isset($skus['items']['item']['skus']))
				{
					$sku = $skus['items']['item']['skus']['sku'];
					if(isset($sku[0]))
					{
						foreach($sku as $kk=>$vv)
						{
							if(isset($vv['outer_id']))
							{
								if(!is_array($vv['outer_id']))
								{
									echo $v['num_iid'].",".$vv['outer_id'].",".$vv['quantity']."<br>";
								}else
								{
									echo $v['num_iid'].",".implode("#",$vv['outer_id']).",".$vv['quantity']."<br>";
								}
							}else
							{
								echo $v['num_iid'].",,".$vv['quantity']."<br>";
							}
						}
					}else{
						if(isset($sku['outer_id']))
						{
							echo $v['num_iid'].",".$sku['outer_id'].",".$sku['quantity']."<br>";
						}else
						{
							echo $v['num_iid'].",,".$sku['quantity']."<br>";
						}
					}
				}
			}
		}
	}
	/*添加商品*/
	function insertGoods($arr,$sn)
	{
		$set = '';
		foreach($arr as $k=>$v)
		{
			$set.= '`'.$k."`='".$v."',";
		}
		$sql = "UPDATE `gxg_goods` SET ".substr($set,0,-1)." WHERE `goods_sn`='".$sn."' LIMIT 1";
		mysql_query($sql);
	}
	/*添加SKU*/
	function insertSkus($data,$sn)
	{
		$set = '';
		$val = array();
		foreach($data[0] as $kkk=>$vvv)
		{
			$set.= '`'.$kkk.'`,';
		}
		$i=0;
		foreach($data as $k=>$v)
		{
			$val[$i] = '';
			foreach($data[$k] as $kk=>$vv)
			{
				$val[$i].= "'".$vv."',";
			}
			$val[$i] = substr($val[$i],0,-1);
			$i++;
		}
		$sql = "INSERT INTO `gxg_goods_sku`(".substr($set,0,-1).") VALUES(".implode($val,"),(").")";
		mysql_query($sql);
	}
	function theEnd($stamp)
	{
		mysql_query("UPDATE `api_log` SET `ended`='".date("Y-m-d H:i:s", time()+28800)."' WHERE `stamp`='".$stamp."' LIMIT 1");
	}
	function getIP()
	{
		global $ip;
		if (getenv("HTTP_CLIENT_IP"))
		$ip = getenv("HTTP_CLIENT_IP");
		else if(getenv("HTTP_X_FORWARDED_FOR"))
		$ip = getenv("HTTP_X_FORWARDED_FOR");
		else if(getenv("REMOTE_ADDR"))
		$ip = getenv("REMOTE_ADDR");
		else $ip = "Unknow";
		return $ip;
	}
?>