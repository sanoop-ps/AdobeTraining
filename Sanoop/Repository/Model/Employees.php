<?php
declare(strict_types=1);

namespace Sanoop\Repository\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Sanoop\Repository\Api\Data\EmployeesInterface;
use Sanoop\Repository\Model\ResourceModel\Employees as ResourceModel;

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

//    /**
//     * Retrieve existing extension attributes object or create a new one.
//     *
//     * @return \Sanoop\Repository\Api\Data\EmployeesExtension|null
//     */
//    public function getExtensionAttributes()
//    {
//        return $this->_getExtensionAttributes();
//    }
//
//    /**
//     * Set an extension attributes object.
//     *
//     * @param \Sanoop\Repository\Api\Data\EmployeesExtension $extensionAttributes
//     * @return $this
//     */
//    public function setExtensionAttributes(
//        \Sanoop\Repository\Api\Data\EmployeesExtension $extensionAttributes
//    ) {
//        return $this->_setExtensionAttributes($extensionAttributes);
//    }
}
