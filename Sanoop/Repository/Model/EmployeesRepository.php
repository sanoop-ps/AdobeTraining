<?php

namespace Sanoop\Repository\Model;

use Sanoop\Repository\Api\Data\EmployeesInterfaceFactory;
use Sanoop\Repository\Api\EmployeesRepositoryInterface;
use Sanoop\Repository\Model\ResourceModel\Employees\Collection;
use Sanoop\Repository\Model\ResourceModel\Employees\CollectionFactory;

class EmployeesRepository implements EmployeesRepositoryInterface
{
    public EmployeesInterfaceFactory $employeesInterfaceFactory;
    public EmployeesFactory $employeesFactory;

    public function __construct(
        EmployeesFactory $employeesFactory,
        EmployeesInterfaceFactory $employeesInterfaceFactory,
        CollectionFactory $employeesCollectionFactory
    ) {
        $this->employeesFactory = $employeesFactory;
        $this->employeesInterfaceFactory = $employeesInterfaceFactory;
        $this->employeesCollectionFactory = $employeesCollectionFactory;
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id)
    {
        $modelData = $this->employeesFactory->create()->load($id);
        $data = $this->employeesInterfaceFactory->create();
        $data->setId((int) $modelData->getId());
        $data->setCompanyId($modelData->getCompanyId());
        $data->setName($modelData->getName());
        $data->setDob($modelData->getDob());
        $data->setPosition($modelData->getPosition());
        $data->setSalary($modelData->getSalary());
        return $data;
    }

    /**
     * @inheritDoc
     */
    public function getByCompanyId(int $companyId)
    {
        $employeeCollection=$this->employeesCollectionFactory->create();
        $employeeCollection->addFieldToFilter('company_id', ['eq'=>$companyId]);
        return $employeeCollection->getData();
    }
}
