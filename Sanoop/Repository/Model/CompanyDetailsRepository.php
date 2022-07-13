<?php
declare(strict_types=1);

namespace Sanoop\Repository\Model;

use Magento\Customer\Api\Data\GroupInterface;
use Magento\Customer\Model\ResourceModel\Group\Collection;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataInterface;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\App\ResourceConnection;
use Sanoop\Repository\Api\CompanyDetailsRepositoryInterface;
use Sanoop\Repository\Api\Data\CompanyDetailsInterface;
use Sanoop\Repository\Api\Data\CompanyDetailsInterfaceFactory;
use Sanoop\Repository\Api\Data\CompanyDetailsSearchResultInterface;
use Sanoop\Repository\Api\Data\CompanyDetailsSearchResultInterfaceFactory;
use Sanoop\Repository\Api\Data\EmployeesInterface;

class CompanyDetailsRepository implements CompanyDetailsRepositoryInterface
{
    public JoinProcessorInterface $extensionAttributesJoinProcessor;
    public CompanyDetailsSearchResultInterfaceFactory $searchResultInterfaceFactory;
    public CollectionProcessorInterface $collectionProcessor;
    public CompanyDetailsSearchResultInterface $searchResultsFactory;
    public ResourceConnection $resourceConnection;
    public CompanyDetailsFactory $companyDetailsFactory;
    public CompanyDetailsInterfaceFactory $companyDetailsInterfaceFactory;

    public function __construct(
        CompanyDetailsFactory $companyDetailsFactory,
        ResourceConnection $resourceConnection,
        CompanyDetailsInterfaceFactory $companyDetailsInterfaceFactory,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        CompanyDetailsSearchResultInterfaceFactory $searchResultInterfaceFactory,
        CollectionProcessorInterface $collectionProcessor,
        CompanyDetailsSearchResultInterface $searchResultsFactory
    ) {
        $this->companyDetailsFactory = $companyDetailsFactory;
        $this->resourceConnection = $resourceConnection;
        $this->companyDetailsInterfaceFactory = $companyDetailsInterfaceFactory;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->searchResultInterfaceFactory = $searchResultInterfaceFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    /**
     * @param string $id
     * @return CompanyDetailsInterface
     */
    public function getById(string $id)
    {
        $modelData=$this->companyDetailsFactory->create()->load($id);
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

//    /**
//     * @param \Magento\Framework\Api\Search\SearchCriteriaInterface $searchCriteria
//     * @return mixed
//     */
//    public function getList(\Magento\Framework\Api\Search\SearchCriteriaInterface $searchCriteria)
//    {
//        $searchResults = $this->searchResultsFactory->create();
//        $searchResults->setSearchCriteria($searchCriteria);
//
//        /** @var Collection $collection */
//        $collection = $this->companyDetailsFactory->create()->getCollection();
//        $companyInterfaceName = EmployeesInterface::class;
//        $this->extensionAttributesJoinProcessor->process($collection, $companyInterfaceName);
//
//        $this->collectionProcessor->process($searchCriteria, $collection);
//
//        /** @var EmployeesInterface[] $companies */
//        $companies = [];
//        foreach ($collection as $company) {
//            /** @var GroupInterface $groupDataObject */
//            $companyDataObject = $this->companyDetailsInterfaceFactory->create();
//            $companyDataObject->setId($company->getId());
//            $companyDataObject->setCompanyName($company->getCompanyName());
//            $companyDataObject->setAnnualIncome($company->getAnnualIncome());
//            $companyDataObject->setAddress($company->getAddress());
//            $companyDataObject->setWorkTimeStart($company->getWorkTimeStart());
//            $companyDataObject->setTotalEmployees($company->getTotalEmployees());
//            $companyDataObject->setStatus($company->getStatus());
//            $data = $company->getData();
//            $data = $this->extensionAttributesJoinProcessor->extractExtensionAttributes($companyInterfaceName, $data);
//            if (isset($data[ExtensibleDataInterface::EXTENSION_ATTRIBUTES_KEY])
//                && ($data[ExtensibleDataInterface::EXTENSION_ATTRIBUTES_KEY] instanceof CompanyDetailsExtension)
//            ) {
//                $companyDataObject->setExtensionAttributes($data[ExtensibleDataInterface::EXTENSION_ATTRIBUTES_KEY]);
//            }
//            $companies[] = $companyDataObject;
//        }
//        $searchResults->setTotalCount($collection->getSize());
//        return $searchResults->setItems($companies);
//    }

//    /**
//     * @param int $id
//     * @return CompanyDetailsInterface
//     */
//    public function getCompanyWithEmployees(int $id)
//    {
//        $modelData = $this->companyDetailsFactory->create()->load($id);
//        $data = $this->companyDetailsInterfaceFactory->create();
//        $data->setId($modelData->getId());
//        $data->setCompanyName($modelData->getCompanyName());
//        $data->setAnnualIncome($modelData->getAnnualIncome());
//        $data->setAddress($modelData->getAddress());
//        $data->setWorkTimeStart($modelData->getWorkTimeStart());
//        $data->setTotalEmployees($modelData->getTotalEmployees());
//        $data->setStatus($modelData->getStatus());
//        return $data;
//    }
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
