<?php

namespace Sanoop\Repository\Api;

use Sanoop\Repository\Api\Data\EmployeesInterface;

interface EmployeesRepositoryInterface
{
    /**
     * @param int $id
     * @return EmployeesInterface
     */
    public function getById(int $id);

    /**
     * @param int $companyId
     * @return EmployeesInterface[]
     */
    public function getByCompanyId(int $companyId);
}
