<?php

namespace TrainingSession2\Preference\Controller\Index;

use Magento\Cms\Controller\Noroute\Index;

class CustomNoRoute extends Index
{

    public function execute()
    {
        $resultForward = $this->resultForwardFactory->create();
        $resultForward->setController('index');
        $resultForward->forward('index');
        return $resultForward;

    }
}

