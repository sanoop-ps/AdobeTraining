<?php

namespace Sanoop\Repository\Model;

use Magento\Framework\Model\AbstractModel;
use Sanoop\Repository\Api\Data\EmployeesInterface;
use Sanoop\Repository\Model\ResourceModel\Employees as ResourceModel;

class Employees extends AbstractModel implements EmployeesInterface
{
    const COMPANY_ID = 'company_id';
    const NAME = 'name';
    const DOB = 'dob';
    const POSITION = 'position';
    const SALARY = 'salary';

    /**
     * @inheritDoc
     */
    public function getCompanyId()
    {
        $this->_getData(self::COMPANY_ID);
    }

    /**
     * @inheritDoc
     */
    public function setCompanyId(int $companyId)
    {
        $this->setData(self::COMPANY_ID, $companyId);
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        $this->_getData(self::NAME);
    }

    /**
     * @inheritDoc
     */
    public function setName(string $name)
    {
        $this->setData(self::NAME, $name);
    }

    /**
     * @inheritDoc
     */
    public function getDob()
    {
        $this->_getData(self::DOB);
    }

    /**
     * @inheritDoc
     */
    public function setDob(string $dob)
    {
        $this->setData(self::DOB, $dob);
    }

    /**
     * @inheritDoc
     */
    public function getPosition()
    {
        $this->_getData(self::POSITION);
    }

    /**
     * @inheritDoc
     */
    public function setPosition(string $position)
    {
        $this->setData(self::POSITION, $position);
    }

    /**
     * @inheritDoc
     */
    public function getSalary()
    {
        $this->_getData(self::SALARY);
    }

    /**
     * @inheritDoc
     */
    public function setSalary(string $salary)
    {
        $this->setData(self::SALARY, $salary);
    }

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}
