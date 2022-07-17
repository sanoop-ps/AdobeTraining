<?php
namespace Sanoop\Assignment4\Plugin\Api;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Sanoop\Assignment4\Api\EmployeesRepositoryInterface;
use \Sanoop\Assignment4\Api\Data\EmployeesExtensionInterfaceFactory;
use Magento\Framework\Api\SearchCriteriaBuilder;

class CompanyDetailsRepository
{
    public EmployeesRepositoryInterface $employeesRepository;
    public EmployeesExtensionInterfaceFactory $employeesExtensionInterfaceFactory;
    public SearchCriteriaBuilder $searchCriteriaBuilder;

    public function __construct(
        EmployeesRepositoryInterface $employeesRepository,
        \Sanoop\Assignment4\Api\Data\EmployeesExtensionInterfaceFactory $employeesExtensionInterfaceFactory,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->employeesRepository=$employeesRepository;
        $this->employeesExtensionInterfaceFactory=$employeesExtensionInterfaceFactory;
        $this->searchCriteriaBuilder=$searchCriteriaBuilder;
    }

    /**
     * @throws LocalizedException
     */
    public function afterGetList(
        \Sanoop\Assignment4\Api\CompanyDetailsRepositoryInterface $subject,
        \Sanoop\Assignment4\Api\Data\CompanyDetailsSearchResultInterface $result
    ) {
        $employees=[];
        foreach ($result->getItems() as $items) {
            try {
                $searchCriteria=$this->searchCriteriaBuilder->addFilter('company_id', $items->getId(), 'eq')->create();
                $data = $this->employeesRepository->getList($searchCriteria)->getItems();
            } catch (NoSuchEntityException $e) {
                return $result;
            }
            $extensionAttribute = $items->getExtensionAttributes();
            $extensionAttributeData = $extensionAttribute ? $extensionAttribute : $this->employeesExtensionInterfaceFactory->create();
            $extensionAttributeData->setCompanyEmployeesAttributes($data);
            $items->setExtensionAttributes($extensionAttributeData);
            $employees[] = $items;
        }
        $result->setItems($employees);
        return $result;
    }
}
