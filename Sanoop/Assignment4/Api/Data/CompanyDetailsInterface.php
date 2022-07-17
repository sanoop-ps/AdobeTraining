<?php
 namespace Sanoop\Assignment4\Api\Data;

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
      * @param string $annualIncome
      * @return void
      */
     public function setAnnualIncome(string $annualIncome);


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
      * @param string $totalEmployees
      * @return void
      */
     public function setTotalEmployees(string $totalEmployees);


     /**
      * @return bool
      */
     public function getStatus();

     /**
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
     public function setExtensionAttributes(\Sanoop\Assignment4\Api\Data\CompanyDetailsExtensionInterface $extensionAttributes);
 }
