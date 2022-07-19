<?php

namespace Sanoop\Assignment4\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Sanoop\Assignment4\Api\Data\EmployeesInterfaceFactory;
use Sanoop\Assignment4\Api\Data\EmployeesSearchResultInterfaceFactory;
use Sanoop\Assignment4\Model\ResourceModel\Employees\CollectionFactory;

class EmployeesRepository implements \Sanoop\Assignment4\Api\EmployeesRepositoryInterface
{

    /**
     * @var EmployeesFactory
     */
    public EmployeesFactory $employeesFactory;
    /**
     * @var EmployeesInterfaceFactory
     */
    public EmployeesInterfaceFactory $employeesInterfaceFactory;
    /**
     * @var CollectionFactory
     */
    public CollectionFactory $employeesCollectionFactory;
    /**
     * @var CollectionProcessorInterface
     */
    public CollectionProcessorInterface $collectionProcessor;
    /**
     * @var EmployeesSearchResultInterfaceFactory
     */
    public EmployeesSearchResultInterfaceFactory $searchResultsFactory;

    /**
     * @param EmployeesInterfaceFactory $employeesInterfaceFactory
     * @param CollectionFactory $employeesCollectionFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param EmployeesSearchResultInterfaceFactory $searchResultsFactory
     * @param EmployeesFactory $employeesFactory
     */
    public function __construct(
        EmployeesInterfaceFactory $employeesInterfaceFactory,
        CollectionFactory $employeesCollectionFactory,
        CollectionProcessorInterface $collectionProcessor,
        EmployeesSearchResultInterfaceFactory $searchResultsFactory,
        EmployeesFactory $employeesFactory
    ) {
        $this->employeesInterfaceFactory=$employeesInterfaceFactory;
        $this->employeesCollectionFactory=$employeesCollectionFactory;
        $this->collectionProcessor=$collectionProcessor;
        $this->searchResultsFactory=$searchResultsFactory;
        $this->employeesFactory=$employeesFactory;
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id)
    {
        $modelData = $this->employeesFactory->create()->load($id);
        $data = $this->employeesInterfaceFactory->create();
        $data->setId($modelData->getId());
        $data->setCompanyId($modelData->getCompanyId());
        $data->setName($modelData->getName());
        $data->setDob($modelData->getDob());
        $data->setPosition($modelData->getPosition());
        $data->setSalary($modelData->getSalary());
        return $data;
    }

    /**
     * @inheritDoc
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->employeesCollectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, ($collection));
        $searchResult = $this->searchResultsFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $data=$collection->getItems();
        $searchResult->setItems($data);
        $searchResult->setTotalCount($collection->getSize());
        return $searchResult;
    }
}
