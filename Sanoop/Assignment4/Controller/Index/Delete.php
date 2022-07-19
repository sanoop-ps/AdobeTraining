<?php

namespace Sanoop\Assignment4\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NotFoundException;
use Sanoop\Assignment4\Api\CompanyDetailsRepositoryInterfaceFactory;

class Delete extends Action
{
    public CompanyDetailsRepositoryInterfaceFactory $customerRepositoryInterfaceFactory;
    public RedirectFactory $resultRedirect;

    public function __construct(
        CompanyDetailsRepositoryInterfaceFactory $customerRepositoryInterfaceFactory,
        RedirectFactory $resultRedirect,
        Context $context
    ) {
        $this->customerRepositoryInterfaceFactory=$customerRepositoryInterfaceFactory;
        $this->resultRedirect=$resultRedirect;
        parent::__construct($context);
    }

    /**
     * Execute action based on request and return result
     *
     * @return ResultInterface|ResponseInterface
     * @throws NotFoundException
     */
    public function execute()
    {
        $customerDetailsId=$this->getRequest()->getParam('id');
        $deletedData=$this->customerRepositoryInterfaceFactory->create()->deleteById($customerDetailsId);
        if ($deletedData) {
            $this->messageManager->addSuccess(__('Company Details '.$customerDetailsId.' deleted successfully'));
            return $this->resultRedirect->setPath('company_details/index/index');
        }
        $this->messageManager->addError(__('Company Details '.$customerDetailsId.' not deleted'));
        return $this->resultRedirect->setPath('company_details/index/index');
    }
}
