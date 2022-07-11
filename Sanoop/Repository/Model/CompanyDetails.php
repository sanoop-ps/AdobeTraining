<?php

namespace Sanoop\Repository\Model;

use Magento\Framework\Model\AbstractModel;
use Sanoop\Repository\Model\ResourceModel\CompanyDetails as ResourceModel;

class CompanyDetails extends AbstractModel
{
    /**
     * @return void
     */
    public function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}

