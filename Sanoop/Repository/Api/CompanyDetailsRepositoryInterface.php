<?php
declare(strict_types=1);

namespace Sanoop\Repository\Api;

use Magento\Framework\Api\Search\SearchCriteriaInterface;
use Sanoop\Repository\Api\Data\CompanyDetailsInterface;

interface CompanyDetailsRepositoryInterface
{
    /**
     * @param string $id
     * @return CompanyDetailsInterface
     */
    public function getById(string $id);

//    /**
//     * @param SearchCriteriaInterface $searchCriteria
//     * @return mixed
//     */
//    public function getList(SearchCriteriaInterface $searchCriteria);

//    /**
//     * @param int $id
//     * @return CompanyDetailsInterface
//     */
//    public function getCompanyWithEmployees(int $id);
}
