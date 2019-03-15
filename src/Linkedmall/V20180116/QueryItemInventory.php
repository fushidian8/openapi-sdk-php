<?php

namespace AlibabaCloud\Linkedmall\V20180116;

use AlibabaCloud\Rpc;

/**
 * @method string getDivisionCode()
 * @method $this withDivisionCode($value)
 * @method string getIp()
 * @method $this withIp($value)
 * @method string getBizId()
 * @method $this withBizId($value)
 * @method array getItemList()
 */
class QueryItemInventory extends Rpc
{
    public $product = 'linkedmall';

    public $version = '2018-01-16';

    public $method = 'POST';

    public $serviceCode = 'linkedmall';

    /**
     * @param array $itemList
     *
     * @return $this
     */
    public function withItemList(array $itemList)
    {
        $this->data['ItemList'] = $itemList;
        foreach ($itemList as $i => $iValue) {
            $this->options['query']['ItemList.' . ($i + 1) . '.ItemId'] = $itemList[$i]['ItemId'];
            foreach ($itemList[$i]['SkuIdLists'] as $j => $jValue) {
                $this->options['query']['ItemList.' . ($i + 1) . '.SkuIdList.' . ($j + 1)] = $jValue;
            }
        }

        return $this;
    }
}