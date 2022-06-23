<?php
namespace Unit2\Secret\Controller\Adminhtml\Action;

use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

class Index extends Action
{
    /**
     * Return a page with text content
     *
     * @return ResponseInterface|ResultInterface
     */
    public function execute()
    {
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $result->setContents('Secret Page!');
        return $result;
    }

    /**
     * Chwcking the permission
     *
     * @return bool
     */
    protected function _isAllowed(): bool
    {
        $secret = $this->getRequest()->getParam('secret');
        return isset($secret) && (int)$secret==1;
    }
    /**
     * Process the Url key
     *
     * @return true
     */
    public function _processUrlKeys(): bool
    {
        return true;
    }
}
