<?php
namespace Unit1\Plugins\Plugin;

use Magento\Theme\Block\Html\Breadcrumbs;

class BeforeBreadcrumbsPlugin
{
    /**
     * Changing breadcrumb label value
     *
     * @param Breadcrumbs $subject
     * @param array $crumbName
     * @param array $crumbInfo
     * @return array
     */
    public function beforeAddCrumb(
        Breadcrumbs $subject,
        array $crumbName,
        array $crumbInfo
    ): array {
        $crumbInfo['label'] = $crumbInfo['label'].'(!b)';
        return [$crumbName, $crumbInfo];
    }
}
