<?php
namespace Unit1\Plugins\Plugin;

use Magento\Theme\Block\Html\Footer;

class AfterFooterPlugin
{
    /**
     * Return custom copyright text
     *
     * @param Footer $subject
     * @param string $result
     * @return string
     */
    public function afterGetCopyright(
        Footer $subject,
        $result
    ): string {
        return 'Customized copyright!';
    }
}
