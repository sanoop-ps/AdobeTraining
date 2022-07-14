<?php
declare(strict_types=1);

namespace Sanoop\Repository\Model;

use Sanoop\Repository\Api\CompanyDetailsRepositoryInterface;
use Sanoop\Repository\Api\Data\CompanyDetailsInterface;
use Sanoop\Repository\Api\Data\CompanyDetailsInterfaceFactory;

class CompanyDetailsRepository implements CompanyDetailsRepositoryInterface
{
    public CompanyDetailsFactory $companyDetailsFactory;
    public CompanyDetailsInterfaceFactory $companyDetailsInterfaceFactory;

    public function __construct(
        CompanyDetailsFactory $companyDetailsFactory,
        CompanyDetailsInterfaceFactory $companyDetailsInterfaceFactory,
    ) {
        $this->companyDetailsFactory = $companyDetailsFactory;
        $this->companyDetailsInterfaceFactory = $companyDetailsInterfaceFactory;
    }

    /**
     * @param int $id
     * @return CompanyDetailsInterface
     */
    public function getById(int $id)
    {
        $modelData = $this->companyDetailsFactory->create()->load($id);
        $data = $this->companyDetailsInterfaceFactory->create();
        $data->setId($modelData->getId());
        $data->setCompanyName($modelData->getCompanyName());
        $data->setAnnualIncome($modelData->getAnnualIncome());
        $data->setAddress($modelData->getAddress());
        $data->setWorkTimeStart($modelData->getWorkTimeStart());
        $data->setTotalEmployees($modelData->getTotalEmployees());
        $data->setStatus($modelData->getStatus());
        return $data;
    }
}
