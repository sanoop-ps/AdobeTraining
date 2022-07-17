<?php
namespace Sanoop\Assignment4\Plugin\Api;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Exception\NoSuchEntityException;
use Sanoop\Assignment4\Api\Data\CompanyDetailsExtensionInterfaceFactory;
use Sanoop\Assignment4\Api\CompanyDetailsRepositoryInterface;
use Sanoop\Assignment4\Model\CompanyDetails;

class EmployeesRepository
{
    public CompanyDetailsRepositoryInterface $companyDetailsRepository;
    public CompanyDetailsExtensionInterfaceFactory $companyDetailsExtensionInterfaceFactory;
    public SearchCriteriaBuilder $searchCriteriaBuilder;

    public function __construct(
        CompanyDetailsRepositoryInterface $companyDetailsRepository,
        \Sanoop\Assignment4\Api\Data\CompanyDetailsExtensionInterfaceFactory $companyDetailsExtensionInterfaceFactory,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->companyDetailsRepository=$companyDetailsRepository;
        $this->companyDetailsExtensionInterfaceFactory=$companyDetailsExtensionInterfaceFactory;
        $this->searchCriteriaBuilder=$searchCriteriaBuilder;
    }


    public function afterGetList(
        \Sanoop\Assignment4\Api\EmployeesRepositoryInterface $subject,
        \Sanoop\Assignment4\Api\Data\EmployeesSearchResultInterface $result
    ) {
        $companies=[];
        foreach ($result->getItems() as $items) {
            try {
                $data = $this->companyDetailsRepository->getById($items->getCompanyId());
            } catch (NoSuchEntityException $e) {
                return $result;
            }
            $extensionAttribute = $items->getExtensionAttributes();
            $extensionAttributeData = $extensionAttribute ? $extensionAttribute : $this->companyDetailsExtensionInterfaceFactory->create();
            $extensionAttributeData->setEmployeesCompanyAttributes($data);
            $items->setExtensionAttributes($extensionAttributeData);
            $companies[] = $items;
        }
        $result->setItems($companies);
        return $result;
    }

}
