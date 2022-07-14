<?php

namespace Sanoop\Repository\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NotFoundException;
use Sanoop\Repository\Api\CompanyDetailsRepositoryInterface;

class CompanyDetailsJoin extends Action
{
    private CompanyDetailsRepositoryInterface $companyDetailsRepositoryInterface;
    private JsonFactory $jsonFactory;

    /**
     * @param Context $context
     * @param JsonFactory $jsonFactory
     * @param CompanyDetailsRepositoryInterface $companyDetailsRepositoryInterface
     */
    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        CompanyDetailsRepositoryInterface $companyDetailsRepositoryInterface
    ) {
        $this->jsonFactory = $jsonFactory;
        $this->companyDetailsRepositoryInterface = $companyDetailsRepositoryInterface;
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
        $data = $this->companyDetailsRepositoryInterface->getById(1);
        $result = $this->jsonFactory->create();
        return $result->setData($data);
    }
}
