<?php

namespace Sanoop\Repository\Model;

use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\App\ResourceConnection;
use Sanoop\Repository\Api\CompanyDetailsRepositoryInterface;
use Sanoop\Repository\Api\Data\CompanyDetailsInterface;
use Sanoop\Repository\Api\Data\CompanyDetailsInterfaceFactory;
use Sanoop\Repository\Api\Data\EmployeesInterface;

class CompanyDetailsRepository implements CompanyDetailsRepositoryInterface
{
    public JoinProcessorInterface $extensionAttributesJoinProcessor;
    private CompanyDetailsFactory $companyDetailsFactory;
    private CompanyDetailsInterfaceFactory $companyDetailsInterfaceFactory;
    private ResourceConnection $resourceConnection;

    /**
     * @var DataObjectHelper
     */

    public function __construct(
        CompanyDetailsFactory $companyDetailsFactory,
        ResourceConnection $resourceConnection,
        CompanyDetailsInterfaceFactory $companyDetailsInterfaceFactory,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
    ) {
        $this->companyDetailsFactory = $companyDetailsFactory;
        $this->resourceConnection = $resourceConnection;
        $this->companyDetailsInterfaceFactory = $companyDetailsInterfaceFactory;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
    }

    /**
     * @param int $id
     * @return CompanyDetailsInterface
     */
    public function getById(int $id)
    {
        $modelData = $this->companyDetailsFactory->create()->load($id);
        $data = $this->companyDetailsInterfaceFactory->create();
        $data->setId($modelData->getId());
        $data->setCompanyName($modelData->getCompanyName());
        $data->setAnnualIncome($modelData->getAnnualIncome());
        $data->setAddress($modelData->getAddress());
        $data->setWorkTimeStart($modelData->getWorkTimeStart());
        $data->setTotalEmployees($modelData->getTotalEmployees());
        $data->setStatus($modelData->getStatus());
        return $data;
    }

    /**
     * @param int $id
     * @return CompanyDetailsInterface
     */
    public function getCompanyDetailsWithEmployees(int $id)
    {
        $groupInterfaceName = EmployeesInterface::class;
        $modelData = $this->companyDetailsFactory->create()->load($id);
        $this->extensionAttributesJoinProcessor->process($modelData, $groupInterfaceName);


        $data = $this->companyDetailsInterfaceFactory->create();
        $data->setId($modelData->getId());
        $data->setCompanyName($modelData->getCompanyName());
        $data->setAnnualIncome($modelData->getAnnualIncome());
        $data->setAddress($modelData->getAddress());
        $data->setWorkTimeStart($modelData->getWorkTimeStart());
        $data->setTotalEmployees($modelData->getTotalEmployees());
        $data->setStatus($modelData->getStatus());

        $Alldata = $modelData->getData();
        $data = $this->extensionAttributesJoinProcessor->extractExtensionAttributes($groupInterfaceName, $data);
        if (isset($data[ExtensibleDataInterface::EXTENSION_ATTRIBUTES_KEY])
            && ($data[ExtensibleDataInterface::EXTENSION_ATTRIBUTES_KEY] instanceof GroupExtensionInterface)
        ) {
            $groupDataObject->setExtensionAttributes($data[ExtensibleDataInterface::EXTENSION_ATTRIBUTES_KEY]);
        }
        $groups[] = $groupDataObject;

        return $data;
    }
}
//$connection = $this->resourceConnection->getConnection();
//        $select = $connection->select()
//            ->from(
//                ['main_table' => 'company_details'],
//            )
//            ->join(
//                ['sub_table' => 'employees'],
//                'main_table.id = sub_table.company_id'
//            )->where('main_table.id = ?', $id);
//
//        return $connection->fetchAll($select);
