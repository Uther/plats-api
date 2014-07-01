<?php

class KuaicheZnPlanListSearch extends JosRequest
{

    public function getApiMethod ()
    {
        return 'jingdong.kuaiche.zn.plan.list.search';
    }

    public function setMode ($mode)
    {
        $this->apiParas['mode'] = $mode;
        return $this;
    }

    public function setPageSize ($size)
    {
        $this->apiParas['page_size'] = $size;
        return $this;
    }

    public function setPageIndex ($index)
    {
        $this->apiParas['page_index'] = $index;
        return $this;
    }
}