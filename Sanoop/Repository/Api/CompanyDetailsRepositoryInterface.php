<?php
declare(strict_types=1);

namespace Sanoop\Repository\Api;

use Sanoop\Repository\Api\Data\CompanyDetailsInterface;

interface CompanyDetailsRepositoryInterface
{
    /**
     * @param int $id
     * @return CompanyDetailsInterface
     */
    public function getById(int $id);

}
