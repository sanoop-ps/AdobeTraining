<?php

namespace Sanoop\Repository\Api;

use Sanoop\Repository\Api\Data\EmployeesInterface;

interface EmployeesRepositoryInterface
{
    /**
     * @param string $id
     * @return EmployeesInterface[]
     */
    public function getById(string $id);
}
