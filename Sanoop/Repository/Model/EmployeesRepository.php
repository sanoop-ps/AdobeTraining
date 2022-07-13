<?php

namespace Sanoop\Repository\Model;

use Sanoop\Repository\Api\Data\EmployeesInterface;
use Sanoop\Repository\Api\Data\EmployeesInterfaceFactory;
use Sanoop\Repository\Api\EmployeesRepositoryInterface;

class EmployeesRepository implements EmployeesRepositoryInterface
{

    public EmployeesInterfaceFactory $employeesInterfaceFactory;
    public EmployeesFactory $employeesFactory;

    public function __construct(
        EmployeesFactory $employeesFactory,
        EmployeesInterfaceFactory $employeesInterfaceFactory
    ) {
        $this->employeesFactory = $employeesFactory;
        $this->employeesInterfaceFactory = $employeesInterfaceFactory;
    }

    /**
     * @param string $id
     * @return EmployeesInterface
     */
    public function getById(string $id)
    {
        $modelData = $this->employeesFactory->create()->load($id);
        $data = $this->employeesInterfaceFactory->create();
        $data->setId($modelData->getId());
//        $data->setCompanyId($modelData->getCompanyId());
//        $data->setName($modelData->getName());
//        $data->setDob($modelData->getDob());
//        $data->setPosition($modelData->getPosition());
//        $data->setSalary($modelData->getSalary());
        return [$data];
    }
}
