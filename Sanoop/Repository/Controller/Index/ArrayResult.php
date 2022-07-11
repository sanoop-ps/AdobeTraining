<?php

namespace Sanoop\Repository\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;
use Sanoop\Repository\Model\CompanyDetailsRepository;

class ArrayResult extends Action implements HttpGetActionInterface
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
     * @return Json
     */
    public function execute()
    {
        $row1 = $this->companyDetailsRepository->getById(1);
        $row2 = $this->companyDetailsRepository->getById(2);
        $data = [$row1->getData(), $row2->getData()];
        $result = $this->jsonFactory->create();
        return $result->setData($data);
    }
}
