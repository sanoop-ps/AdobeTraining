<?php

namespace Sanoop\Repository\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface CompanyDetailsInterface extends ExtensibleDataInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return void
     */
    public function setId(int $id);

    /**
     * @return string
     */
    public function getCompanyName();

    /**
     * @param string $companyName
     * @return void
     */
    public function setCompanyName(string $companyName);


    /**
     * @return int
     */
    public function getAnnualIncome();


    /**
     * @param int $annualIncome
     * @return void
     */
    public function setAnnualIncome(int $annualIncome);


    /**
     * @return string
     */
    public function getAddress();

    /**
     * @param string $address
     * @return void
     */
    public function setAddress(string $address);

    /**
     * @return string
     */
    public function getWorkTimeStart();

    /**
     * @param string $workTimeStart
     * @return void
     */
    public function setWorkTimeStart(string $workTimeStart);

    /**
     * @return string
     */
    public function getWorkTimeEnd();

    /**
     * @param string $workTimeEnd
     * @return void
     */
    public function setWorkTimeEnd(string $workTimeEnd);

    /**
     * @return int
     */
    public function getTotalEmployees();

    /**
     * @param int $totalEmployees
     * @return void
     */
    public function setTotalEmployees(int $totalEmployees);


    /**
     * @return bool
     */
    public function getStatus();

    /**
     * @param bool $status
     * @return void
     */
    public function setStatus(bool $status);

    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return EmployeesInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     *
     * @param EmployeesInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(EmployeesInterface $extensionAttributes);
}
