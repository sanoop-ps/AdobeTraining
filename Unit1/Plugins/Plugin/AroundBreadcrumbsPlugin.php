<?php

namespace Unit1\Plugins\Plugin;

use Magento\Theme\Block\Html\Breadcrumbs;

class AroundBreadcrumbsPlugin
{
    /**
     * Changing breadcrumb label value
     *
     * @param Breadcrumbs $subject
     * @param callable $proceed
     * @param string $crumbName
     * @param array $crumbInfo
     * @return void
     */
    public function aroundAddCrumb(
        Breadcrumbs $subject,
        callable $proceed,
        string $crumbName,
        array $crumbInfo
    ) {
        $crumbInfo['label'] = $crumbInfo['label'] . '(!a)';
        $proceed($crumbName, $crumbInfo);
    }
}
