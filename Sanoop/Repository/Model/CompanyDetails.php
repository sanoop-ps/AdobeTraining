<?php

namespace Sanoop\Repository\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Sanoop\Repository\Api\Data\CompanyDetailsInterface;
use Sanoop\Repository\Api\Data\EmployeesInterface;
use Sanoop\Repository\Model\ResourceModel\CompanyDetails as ResourceModel;

class CompanyDetails extends AbstractExtensibleModel implements CompanyDetailsInterface
{
    const COMPANY_NAME = 'company_name';
    const ANNUAL_INCOME = 'annual_income';
    const ADDRESS = 'address';
    const WORK_TIME_START = 'work_time_start';
    const WORK_TIME_END = 'work_time_end';
    const TOTAL_EMPLOYEE = 'total_employees';
    const STATUS = 'status';
    const ID = 'id';

    /**
     * @return void
     */
    public function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * @inheritDoc
     */
    public function getCompanyName()
    {
        return $this->_getData(self::COMPANY_NAME);
    }

    /**
     * @inheritDoc
     */
    public function setCompanyName(string $companyName)
    {
        return $this->setData(self::COMPANY_NAME, $companyName);
    }

    /**
     * @inheritDoc
     */
    public function getAnnualIncome()
    {
        return $this->_getData(self::ANNUAL_INCOME);
    }

    /**
     * @inheritDoc
     */
    public function setAnnualIncome(int $annualIncome)
    {
        return $this->setData(self::ANNUAL_INCOME, $annualIncome);
    }

    /**
     * @inheritDoc
     */
    public function getAddress()
    {
        return $this->_getData(self::ADDRESS);
    }

    /**
     * @inheritDoc
     */
    public function setAddress(string $address)
    {
        return $this->setData(self::ADDRESS, $address);
    }

    /**
     * @inheritDoc
     */
    public function getWorkTimeStart()
    {
        return $this->_getData(self::WORK_TIME_START);
    }

    /**
     * @inheritDoc
     */
    public function setWorkTimeStart(string $workTimeStart)
    {
        return $this->setData(self::WORK_TIME_START, $workTimeStart);
    }

    /**
     * @inheritDoc
     */
    public function getWorkTimeEnd()
    {
        return $this->_getData(self::WORK_TIME_END);
    }

    /**
     * @inheritDoc
     */
    public function setWorkTimeEnd(string $workTimeEnd)
    {
        return $this->setData(self::WORK_TIME_END, $workTimeEnd);
    }

    /**
     * @inheritDoc
     */
    public function getTotalEmployees()
    {
        return $this->_getData(self::TOTAL_EMPLOYEE);
    }

    /**
     * @inheritDoc
     */
    public function setTotalEmployees(int $totalEmployees)
    {
        return $this->setData(self::TOTAL_EMPLOYEE, $totalEmployees);
    }

    /**
     * @inheritDoc
     */
    public function getStatus()
    {
        return $this->_getData(self::STATUS);
    }

    /**
     * @inheritDoc
     */
    public function setStatus(bool $status)
    {
        return $this->setData(self::STATUS, $status);
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
    public function setExtensionAttributes(EmployeesInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

}

