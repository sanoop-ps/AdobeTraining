<?php

namespace Sanoop\Assignment5\CustomerData;

use Magento\Customer\CustomerData\SectionSourceInterface;
use Magento\Customer\Model\Session;

class CustomerNames implements SectionSourceInterface
{
    public Session $customerSession;

    public function __construct(Session $customerSession)
    {
        $this->customerSession = $customerSession;
    }

    /**
     * @inheritDoc
     */
    public function getSectionData()
    {
        $customer = $this->customerSession->getCustomer();
        return [
            'msg' => $customer->getName(),
        ];
    }
}
