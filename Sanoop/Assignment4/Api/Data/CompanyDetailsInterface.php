<?php
 namespace Sanoop\Assignment4\Api\Data;

 use Magento\Framework\Api\ExtensibleDataInterface;

interface CompanyDetailsInterface extends ExtensibleDataInterface
{
    /**
     * Get Id
     *
     * @return int
     */
    public function getId();

    /**
     *  Set Id
     *
     * @param int $id
     * @return void
     */
    public function setId(int $id);

    /**
     * Get Company name
     *
     * @return string
     */
    public function getCompanyName();

    /**
     * Set Company name
     *
     * @param string $companyName
     * @return void
     */
    public function setCompanyName(string $companyName);

    /**
     * Get Annual income
     *
     * @return int
     */
    public function getAnnualIncome();

    /**
     * Set Annual income
     *
     * @param string $annualIncome
     * @return void
     */
    public function setAnnualIncome(string $annualIncome);

    /**
     * Get Address
     *
     * @return string
     */
    public function getAddress();

    /**
     * Set Address
     *
     * @param string $address
     * @return void
     */
    public function setAddress(string $address);

    /**
     * Get Work time start
     *
     * @return string
     */
    public function getWorkTimeStart();

    /**
     * Set Work time start
     *
     * @param string $workTimeStart
     * @return void
     */
    public function setWorkTimeStart(string $workTimeStart);

    /**
     * Get Work time end
     *
     * @return string
     */
    public function getWorkTimeEnd();

    /**
     * Set Work time end
     *
     * @param string $workTimeEnd
     * @return void
     */
    public function setWorkTimeEnd(string $workTimeEnd);

    /**
     * Get Total employees
     *
     * @return int
     */
    public function getTotalEmployees();

    /**
     * Set Total employees
     *
     * @param string $totalEmployees
     * @return void
     */
    public function setTotalEmployees(string $totalEmployees);

    /**
     * Get Status
     *
     * @return bool
     */
    public function getStatus();

    /**
     * Set Status
     *
     * @param string $status
     * @return void
     */
    public function setStatus(string $status);

    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return \Sanoop\Assignment4\Api\Data\CompanyDetailsExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     *
     * @param \Sanoop\Assignment4\Api\Data\CompanyDetailsExtensionInterface|null $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Sanoop\Assignment4\Api\Data\CompanyDetailsExtensionInterface $extensionAttributes
    );
}
