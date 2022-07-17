<?php

namespace Sanoop\Assignment4\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Sanoop\Assignment4\Api\Data\CompanyDetailsInterfaceFactory;
use Sanoop\Assignment4\Model\ResourceModel\CompanyDetails\CollectionFactory;
use Sanoop\Assignment4\Api\Data\CompanyDetailsSearchResultInterfaceFactory;

class CompanyDetailsRepository implements \Sanoop\Assignment4\Api\CompanyDetailsRepositoryInterface
{
    public CompanyDetailsFactory $companyDetailsFactory;
    public CompanyDetailsInterfaceFactory $companyDetailsInterfaceFactory;
    public CollectionFactory $companyDetailsCollectionFactory;
    public CollectionProcessorInterface $collectionProcessor;
    public CompanyDetailsSearchResultInterfaceFactory $searchResultsFactory;

    public function __construct(
        CompanyDetailsInterfaceFactory $companyDetailsInterfaceFactory,
        CollectionFactory $companyDetailsCollectionFactory,
        CollectionProcessorInterface $collectionProcessor,
        CompanyDetailsSearchResultInterfaceFactory $searchResultsFactory,
        CompanyDetailsFactory $companyDetailsFactory
    ) {
        $this->companyDetailsInterfaceFactory=$companyDetailsInterfaceFactory;
        $this->companyDetailsCollectionFactory=$companyDetailsCollectionFactory;
        $this->collectionProcessor=$collectionProcessor;
        $this->searchResultsFactory=$searchResultsFactory;
        $this->companyDetailsFactory=$companyDetailsFactory;
    }

    /**
     * @inheritDoc
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
        $data->setWorkTimeEnd($modelData->getWorkTimeEnd());
        $data->setTotalEmployees($modelData->getTotalEmployees());
        $data->setStatus($modelData->getStatus());
        return $data;
    }

    /**
     * @inheritDoc
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->companyDetailsCollectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, ($collection));
        $searchResult = $this->searchResultsFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $data=$collection->getItems();
        $searchResult->setItems($data);
        $searchResult->setTotalCount($collection->getSize());
        return $searchResult;
    }
}
