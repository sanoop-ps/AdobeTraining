<?php
namespace Unit3\HelloWorldBlock\Block;

use Magento\Framework\View\Element\AbstractBlock;

class Test extends AbstractBlock
{
    /**
     * Returns a html representation of the object.
     *
     * @return string
     */
    protected function _toHtml(): string
    {
        return "<b>Hello world from the block!</b>";
    }
}
