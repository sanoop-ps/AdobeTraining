<?php

namespace Sanoop\Repository\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Sanoop\Repository\Api\Data\CompanyDetailsInterface;

interface CompanyDetailsRepositoryInterface
{
    /**
     * @param int $id
     * @return CompanyDetailsInterface
     */
    public function getById(int $id);

    /**
     * @param int $id
     * @return CompanyDetailsInterface
     */
    public function getCompanyDetailsWithEmployees(int $id);

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return mixed
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
