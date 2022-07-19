<?php

namespace Sanoop\Assignment4\Block\Index;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\View\Element\Template\Context;
use Sanoop\Assignment4\Api\CompanyDetailsRepositoryInterface;

class Edit extends \Magento\Framework\View\Element\Template
{
    /**
     * @var CompanyDetailsRepositoryInterface
     */
    public CompanyDetailsRepositoryInterface $companyDetailsRepository;

    /**
     * @param CompanyDetailsRepositoryInterface $companyDetailsRepository
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        CompanyDetailsRepositoryInterface $companyDetailsRepository,
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    ) {
        $this->companyDetailsRepository=$companyDetailsRepository;
        parent::__construct($context, $data);
    }

    public function getDataById()
    {
        return $this->companyDetailsRepository->getById($this->getRequest()->getParam('id'));
    }
}
