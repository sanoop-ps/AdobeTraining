<?php

namespace TrainingSession2\Preference\Controller\Index;

use Magento\Cms\Controller\Noroute\Index;
use Magento\Framework\Controller\Result\Forward;
use Magento\Framework\Controller\ResultInterface;

class CustomNoRoute extends Index
{
    /**
     * Execute method
     *
     * @return Forward|ResultInterface
     */
    public function execute()
    {
        $resultForward = $this->resultForwardFactory->create();
        $resultForward->setController('index');
        $resultForward->forward('index');
        return $resultForward;
    }
}
