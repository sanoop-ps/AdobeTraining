<?php

namespace Sanoop\Assignment4\Model\ResourceModel\CompanyDetails;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Sanoop\Assignment4\Model\CompanyDetails as Model;
use Sanoop\Assignment4\Model\ResourceModel\CompanyDetails as ResourceModel;

class Collection extends AbstractCollection
{
    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
