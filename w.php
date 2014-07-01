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
?>