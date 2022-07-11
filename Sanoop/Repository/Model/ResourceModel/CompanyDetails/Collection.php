<?php

namespace Sanoop\Repository\Model\ResourceModel\CompanyDetails;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Sanoop\Repository\Model\CompanyDetails as Model;
use Sanoop\Repository\Model\ResourceModel\CompanyDetails as ResourceModel;

class Collection extends AbstractCollection
{
    /**
     * Initialize collection model.
     */
    public function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
