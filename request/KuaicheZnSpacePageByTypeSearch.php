<?php

/**
 * 站内推广-根据投放类型获取广告位页面信息
 * @author sanwv
 *
 */
class KuaicheZnSpacePageByTypeSearch extends JosRequest
{

    const TYPE_CHANNEL = '1';

    const TYPE_SEARCH = '2';

    public function getApiMethod ()
    {
        return 'jingdong.kuaiche.zn.space.page.by.type.search';
    }

    public function setType ($type)
    {
        $this->apiParas['type'] = $type;
        return $this;
    }
}