<?php

namespace Sanoop\Assignment4\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Sanoop\Assignment4\Api\Data\CompanyDetailsInterfaceFactory;
use Sanoop\Assignment4\Model\ResourceModel\CompanyDetails\CollectionFactory;
use Sanoop\Assignment4\Api\Data\CompanyDetailsSearchResultInterfaceFactory;
use Sanoop\Assignment4\Model\ResourceModel\CompanyDetails as ResourceModel;

class CompanyDetailsRepository implements \Sanoop\Assignment4\Api\CompanyDetailsRepositoryInterface
{
    /**
     * @var CompanyDetailsFactory
     */
    public CompanyDetailsFactory $companyDetailsFactory;
    /**
     * @var CompanyDetailsInterfaceFactory
     */
    public CompanyDetailsInterfaceFactory $companyDetailsInterfaceFactory;
    /**
     * @var CollectionFactory
     */
    public CollectionFactory $companyDetailsCollectionFactory;
    /**
     * @var CollectionProcessorInterface
     */
    public CollectionProcessorInterface $collectionProcessor;
    /**
     * @var CompanyDetailsSearchResultInterfaceFactory
     */
    public CompanyDetailsSearchResultInterfaceFactory $searchResultsFactory;
    public ResourceModel $resourceModel;

    /**
     * @param CompanyDetailsInterfaceFactory $companyDetailsInterfaceFactory
     * @param CollectionFactory $companyDetailsCollectionFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param CompanyDetailsSearchResultInterfaceFactory $searchResultsFactory
     * @param CompanyDetailsFactory $companyDetailsFactory
     */
    public function __construct(
        CompanyDetailsInterfaceFactory $companyDetailsInterfaceFactory,
        CollectionFactory $companyDetailsCollectionFactory,
        CollectionProcessorInterface $collectionProcessor,
        CompanyDetailsSearchResultInterfaceFactory $searchResultsFactory,
        CompanyDetailsFactory $companyDetailsFactory,
        ResourceModel $resourceModel
    ) {
        $this->companyDetailsInterfaceFactory=$companyDetailsInterfaceFactory;
        $this->companyDetailsCollectionFactory=$companyDetailsCollectionFactory;
        $this->collectionProcessor=$collectionProcessor;
        $this->searchResultsFactory=$searchResultsFactory;
        $this->companyDetailsFactory=$companyDetailsFactory;
        $this->resourceModel = $resourceModel;
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

    /**
     * @inheritDoc
     */
    public function save($companyDetails)
    {
        return $this->resourceModel->save($companyDetails);
    }

    /**
     * @inheritDoc
     */
    public function deleteById($companyDetailsId)
    {
        $modelData=$this->companyDetailsFactory->create()->load($companyDetailsId);
        $modelData->delete();
        return true;
    }
}
