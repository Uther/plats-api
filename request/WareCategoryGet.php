<?php

class WareCategoryGet extends JosRequest
{

    public function getApiMethod ()
    {
        return 'jingdong.warecategory.get';
    }

    public function setCid ($cid)
    {
        $this->apiParas['cid'] = $cid;
        return $this;
    }

    public function setLevel ($level)
    {
        $this->apiParas['level'] = $level;
        return $this;
    }

    public function setFields ($fields)
    {
        $this->apiParas['fields'] = $fields;
        return $this;
    }
}