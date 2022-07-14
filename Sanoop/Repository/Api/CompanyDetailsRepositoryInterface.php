<?php
declare(strict_types=1);

namespace Sanoop\Repository\Api;

use Magento\Framework\Api\Search\SearchCriteriaInterface;
use Sanoop\Repository\Api\Data\CompanyDetailsInterface;

interface CompanyDetailsRepositoryInterface
{
    /**
     * @param int $id
     * @return CompanyDetailsInterface
     */
    public function getById(int $id);

}
