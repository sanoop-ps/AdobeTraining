<?php

namespace Sanoop\Repository\Plugin\Model;

use Sanoop\Repository\Model\CompanyDetailsRepository;
use \Sanoop\Repository\Api\Data\EmployeesExtensionFactory;
use Sanoop\Repository\Api\Data\EmployeesInterface;
use Sanoop\Repository\Api\EmployeesRepositoryInterface;

class EmployeesRepository
{
    public EmployeesExtensionFactory $employeesExtensionFactory;
    public CompanyDetailsRepository $companyDetailsRepository;

    /**
     * @param EmployeesExtensionFactory $employeesExtensionFactory
     */
    public function __construct(CompanyDetailsRepository $companyDetailsRepository, EmployeesExtensionFactory $employeesExtensionFactory)
    {
        $this->companyDetailsRepository=$companyDetailsRepository;
        $this->employeesExtensionFactory=$employeesExtensionFactory;
    }

    /**
     * @param EmployeesRepositoryInterface $subject
     * @param EmployeesInterface $resultData
     * @return EmployeesInterface
     */
    public function afterGetById(
        \Sanoop\Repository\Api\EmployeesRepositoryInterface $subject,
        \Sanoop\Repository\Api\Data\EmployeesInterface $resultData
    ) {
        $extensionAttribute=$resultData->getExtensionAttributes();
        $employeesExtension=$extensionAttribute ? $extensionAttribute: $this->employeesExtensionFactory->create();
        $companyData=$this->companyDetailsRepository->getById((int)$resultData->getId());
        $employeesExtension->setEmployeesCompanyAttributes($companyData);
        return $resultData->setExtensionAttributes($employeesExtension);
    }
}
