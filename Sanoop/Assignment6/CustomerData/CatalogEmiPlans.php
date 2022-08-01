<?php

namespace Sanoop\Assignment6\CustomerData;

use Magento\Customer\CustomerData\SectionSourceInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Customer\Model\Session;

class CatalogEmiPlans implements SectionSourceInterface
{
    public ScopeConfigInterface $scopeConfig;
    public Session $customerSession;

    public function __construct(ScopeConfigInterface $scopeConfig, Session $customerSession)
    {
        $this->scopeConfig = $scopeConfig;
        $this->customerSession = $customerSession;
    }

    /**
     * @inheritDoc
     */
    public function getSectionData()
    {
        return [
            'msg' => $this->filterEmiOption(),
        ];
    }

    public function filterEmiOption()
    {
        $emiOptions = $this->getEmiOptions();
        $customer = $this->customerSession->getCustomer();
        $customerGender = $customer->getGender();
        if (!$customerGender) {
            $customerGender = 1;
        }
        $filteredOptions = [];
        foreach ($emiOptions as $emiOption) {
            if ($emiOption['gender'] == $customerGender) {
                $filteredOptions[] = [
                    'interest_rate' => $emiOption['interest_rate'],
                    'tenure' => $emiOption['tenure'],
                ];
            }
        }
        return $filteredOptions;
    }

    public function getEmiOptions()
    {
        return json_decode($this->scopeConfig->getValue('catalog_emi/catalog_emi_fields/emi_options'), true);
    }
}
