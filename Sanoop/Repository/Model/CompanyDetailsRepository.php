<?php

namespace Sanoop\Repository\Model;

use Sanoop\Repository\Api\CompanyDetailsRepositoryInterface;

class CompanyDetailsRepository implements CompanyDetailsRepositoryInterface
{
    private CompanyDetailsFactory $companyDetailsFactory;

    public function __construct(CompanyDetailsFactory $companyDetailsFactory)
    {
        $this->companyDetailsFactory = $companyDetailsFactory;
    }

    /**
     * @param int $id
     * @return CompanyDetails
     */
    public function getById(int $id)
    {
        $company = $this->companyDetailsFactory->create();
        return $company->load($id);
    }

}
