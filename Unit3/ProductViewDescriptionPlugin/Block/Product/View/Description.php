<?php
namespace Unit3\ProductViewDescriptionPlugin\Block\Product\View;

use Magento\Framework\View\Element\Template;

class Description extends Template
{
    /**
     * Set product description
     *
     * @param \Magento\Catalog\Block\Product\View\Description $description
     * @return void
     */
    public function beforeToHtml(\Magento\Catalog\Block\Product\View\Description $description)
    {
        $description->getProduct()->setDescription('product description!');
    }
}
