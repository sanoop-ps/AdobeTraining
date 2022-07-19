<?php

namespace Sanoop\Assignment4\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NotFoundException;
use Sanoop\Assignment4\Api\CompanyDetailsRepositoryInterfaceFactory;
use Sanoop\Assignment4\Api\Data\CompanyDetailsInterfaceFactory;

class Save extends Action
{
    public CompanyDetailsRepositoryInterfaceFactory $companyDetailsRepositoryInterfaceFactory;
    public RedirectFactory $resultRedirect;
    public CompanyDetailsInterfaceFactory $companyDetailsInterfaceFactory;

    public function __construct(
        CompanyDetailsRepositoryInterfaceFactory $companyDetailsRepositoryInterfaceFactory,
        RedirectFactory $resultRedirect,
        CompanyDetailsInterfaceFactory $companyDetailsInterfaceFactory,
        Context $context
    ) {
        $this->companyDetailsRepositoryInterfaceFactory=$companyDetailsRepositoryInterfaceFactory;
        $this->companyDetailsInterfaceFactory=$companyDetailsInterfaceFactory;
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
        $data=$this->getRequest()->getParams();
        if (isset($data['id'])) {
            $companyDetails=$this->companyDetailsRepositoryInterfaceFactory->create()->getById($data['id']);
            $companyDetails->setCompanyName($data['company_name']);
            $companyDetails->setAnnualIncome($data['annual_income']);
            $companyDetails->setAddress($data['address']);
            $companyDetails->setWorkTimeStart($data['work_time_start']);
            $companyDetails->setWorkTimeEnd($data['work_time_end']);
            $companyDetails->setTotalEmployees($data['total_employees']);
            $this->companyDetailsRepositoryInterfaceFactory->create()->save($companyDetails);
        } else {
            $companyDetails=$this->companyDetailsInterfaceFactory->create();
            $companyDetails->setCompanyName($data['company_name']);
            $companyDetails->setAnnualIncome($data['annual_income']);
            $companyDetails->setAddress($data['address']);
            $companyDetails->setWorkTimeStart($data['work_time_start']);
            $companyDetails->setWorkTimeEnd($data['work_time_end']);
            $companyDetails->setTotalEmployees($data['total_employees']);
            $this->companyDetailsRepositoryInterfaceFactory->create()->save($companyDetails);
        }
        $this->messageManager->addSuccess(__('Company Details savaed successfully'));
        return $this->resultRedirect->create()->setPath('company_details/index/index');
    }
}
