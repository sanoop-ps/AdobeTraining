<?php
declare(strict_types=1);

namespace Sanoop\Repository\Plugin\Model;

use \Sanoop\Repository\Api\Data\CompanyDetailsExtensionFactory;
use Sanoop\Repository\Model\EmployeesRepository;

class CompanyDetailsRepository
{
    public CompanyDetailsExtensionFactory $companyDetailsExtensionFactory;
    public EmployeesRepository $employeesRepositoryInterface;

    public function __construct(CompanyDetailsExtensionFactory $companyDetailsExtensionFactory, EmployeesRepository $employeesRepository)
    {
        $this->companyDetailsExtensionFactory=$companyDetailsExtensionFactory;
        $this->employeesRepository=$employeesRepository;
    }

    /**
     * @param \Sanoop\Repository\Model\CompanyDetailsRepository $subject
     * @param $result
     * @return void
     */
    public function afterGetById(
        \Sanoop\Repository\Api\CompanyDetailsRepositoryInterface $subject,
        \Sanoop\Repository\Api\Data\CompanyDetailsInterface $resultData
    ) {
        $extensionAttribute=$resultData->getExtensionAttributes();
        $companyExtension=$extensionAttribute ? $extensionAttribute: $this->companyDetailsExtensionFactory->create();
        $employeesData=$this->employeesRepository->getById((string)$resultData->getId());
        $companyExtension->setCompanyEmployeesAttributes($employeesData);
        return $resultData->setExtensionAttributes($companyExtension);
    }
}
