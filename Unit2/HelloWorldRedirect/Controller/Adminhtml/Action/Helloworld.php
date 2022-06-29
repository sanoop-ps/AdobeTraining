<?php
namespace Unit2\HelloWorldRedirect\Controller\Adminhtml\Action;

use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;

class Helloworld extends Action
{
    /**
     * Execute method
     *
     * @return ResponseInterface|ResultInterface|void
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('catalog/category/edit/id/3');
        return $resultRedirect;
    }

    /**
     * Url key process
     *
     * @return bool
     */
    public function _processUrlKeys(): bool
    {
        return true;
    }
}
