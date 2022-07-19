<?php

namespace Sanoop\Assignment4\Block\Index;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\Template\Context;
use Sanoop\Assignment4\Api\CompanyDetailsRepositoryInterface;

class Index extends \Magento\Framework\View\Element\Template
{
    /**
     * @var CompanyDetailsRepositoryInterface
     */
    public CompanyDetailsRepositoryInterface $companyDetailsRepository;
    /**
     * @var SearchCriteriaBuilder
     */
    public SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * @param CompanyDetailsRepositoryInterface $companyDetailsRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        CompanyDetailsRepositoryInterface $companyDetailsRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    ) {
        $this->companyDetailsRepository=$companyDetailsRepository;
        $this->searchCriteriaBuilder=$searchCriteriaBuilder;
        parent::__construct($context, $data);
    }

    /**
     * @throws LocalizedException
     */
    public function getAllData()
    {
        $searchCriteria=$this->searchCriteriaBuilder->create();
        return $this->companyDetailsRepository->getList($searchCriteria)->getItems();
    }
}
