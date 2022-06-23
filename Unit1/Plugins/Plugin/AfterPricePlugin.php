<?php
namespace Unit1\Plugins\Plugin;

use Magento\Catalog\Model\Product;

class AfterPricePlugin
{
    /**
     * Return altered price value
     *
     * @param Product $subject
     * @param int|float $result
     * @return float
     */
    public function afterGetPrice(
        Product $subject,
        $result
    ): float {
        return $result+0.5;
    }
}
