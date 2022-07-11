<?php

namespace Sanoop\Repository\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NotFoundException;
use Sanoop\Repository\Model\CompanyDetailsRepository;

class CompanyDetailsJoin extends Action
{
    private CompanyDetailsRepository $companyDetailsRepository;
    private JsonFactory $jsonFactory;

    /**
     * @param Context $context
     * @param JsonFactory $jsonFactory
     * @param CompanyDetailsRepository $companyDetailsRepository
     */
    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        CompanyDetailsRepository $companyDetailsRepository
    ) {
        $this->jsonFactory = $jsonFactory;
        $this->companyDetailsRepository = $companyDetailsRepository;
        parent::__construct($context);
    }

    /**
     * Execute action based on request and return result
     *
     * @return ResultInterface|ResponseInterface
     * @throws NotFoundException
     */
    public function execute()
    {
        $data = $this->companyDetailsRepository->getCompanyDetails(1);
        $result = $this->jsonFactory->create();
        return $result->setData($data);
    }
}
