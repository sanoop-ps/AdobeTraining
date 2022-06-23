<?php
namespace Unit3\TemplateBlock\Block;

use Magento\Framework\View\Element\Template\Context;

class Template extends \Magento\Framework\View\Element\Template
{
    /**
     * @param Context $context
     * @param array $data
     * phpcs:disable Generic.CodeAnalysis.UselessOverridingMethod
     */
    public function __construct(
        Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }
}
