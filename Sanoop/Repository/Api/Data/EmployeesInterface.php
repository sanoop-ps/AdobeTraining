<?php

namespace Sanoop\Repository\Api\Data;

use Magento\Framework\Api\ExtensionAttributesInterface;
use Magento\Tests\NamingConvention\true\string;

interface EmployeesInterface extends ExtensionAttributesInterface
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
     * @return int
     */
    public function getCompanyId();

    /**
     * @param int $companyId
     * @return void
     */
    public function setCompanyId(int $companyId);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name);

    /**
     * @return string
     */
    public function getDob();

    /**
     * @param string $dob
     * @return void
     */
    public function setDob(string $dob);

    /**
     * @return void
     */
    public function getPosition();

    /**
     * @param string $position
     * @return void
     */
    public function setPosition(string $position);

    /**
     * @return string
     */
    public function getSalary();

    /**
     * @param string $salary
     * @return void
     */
    public function setSalary(string $salary);

}
