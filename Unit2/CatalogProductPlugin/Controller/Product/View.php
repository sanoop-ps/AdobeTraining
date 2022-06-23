<?php
namespace Unit2\CatalogProductPlugin\Controller\Product;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;

class View extends Action
{
    /**
     * Execute method loads a page with a text
     *
     * @return ResponseInterface|ResultInterface
     * */
    public function execute()
    {
        return $this->resultFactory->create('raw')->setContents(' echo plugin ');
    }
    /**
     * After plugin for execute method
     *
     * @param \Magento\Catalog\Controller\Product\View $controller
     * @param mixed $result
     * @return mixed
     **/
    public function afterExecute(\Magento\Catalog\Controller\Product\View $controller, $result)
    {
        return $result;
    }
}
