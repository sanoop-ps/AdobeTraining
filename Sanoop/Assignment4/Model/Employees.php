<?php

namespace Sanoop\Assignment4\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Sanoop\Assignment4\Model\ResourceModel\Employees as ResourceModel;
use Sanoop\Assignment4\Api\Data\EmployeesInterface;

class Employees extends AbstractExtensibleModel implements EmployeesInterface
{
    const COMPANY_ID = 'company_id';
    const NAME = 'name';
    const DOB = 'dob';
    const POSITION = 'position';
    const SALARY = 'salary';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * @inheritDoc
     */
    public function getCompanyId()
    {
        return $this->getData(self::COMPANY_ID);
    }

    /**
     * @inheritDoc
     */
    public function setCompanyId($companyId)
    {
        return $this->setData(self::COMPANY_ID, $companyId);
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->_getData(self::NAME);
    }

    /**
     * @inheritDoc
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * @inheritDoc
     */
    public function getDob()
    {
        return $this->_getData(self::DOB);
    }

    /**
     * @inheritDoc
     */
    public function setDob(string $dob)
    {
        return $this->setData(self::DOB, $dob);
    }

    /**
     * @inheritDoc
     */
    public function getPosition()
    {
        return $this->_getData(self::POSITION);
    }

    /**
     * @inheritDoc
     */
    public function setPosition(string $position)
    {
        return $this->setData(self::POSITION, $position);
    }

    /**
     * @inheritDoc
     */
    public function getSalary()
    {
        return $this->_getData(self::SALARY);
    }

    /**
     * @inheritDoc
     */
    public function setSalary(string $salary)
    {
        return $this->setData(self::SALARY, $salary);
    }

    /**
     * @inheritDoc
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * @inheritDoc
     */
    public function setExtensionAttributes(\Sanoop\Assignment4\Api\Data\EmployeesExtensionInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
