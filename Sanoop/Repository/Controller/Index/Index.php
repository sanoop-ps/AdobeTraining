<?php

namespace Sanoop\Repository\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\ResultInterface;
use Sanoop\Repository\Model\CompanyDetailsRepository;

class Index extends Action
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
     * @return ResponseInterface|Json|ResultInterface
     */
    public function execute()
    {
        $result = $this->jsonFactory->create();
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            $data = $this->companyDetailsRepository->getById($id);
            if ($data->getData()) {
                return $result->setData($data);
            }
        } else {
            return $result->setData(__('Parameter Not found!!'));
        }
        return $result->setData(__('No Data found!!'));
    }
}
