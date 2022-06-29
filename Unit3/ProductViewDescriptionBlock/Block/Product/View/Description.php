<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit3\ProductViewDescriptionBlock\Block\Product\View;

class Description extends \Magento\Framework\View\Element\Template
{
    /**
     * Function used to set custom description template
     *
     * @param \Magento\Catalog\Block\Product\View\Description $description
     */
    public function beforeToHtml(\Magento\Catalog\Block\Product\View\Description
                                 $description)
    {
        $description->setTemplate('Unit3_ProductViewDescriptionBlock::description.phtml');
    }
}
