<?php

namespace Sanoop\Assignment4\Model\ResourceModel\Employees;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Sanoop\Assignment4\Model\Employees as Model;
use Sanoop\Assignment4\Model\ResourceModel\Employees as ResourceModel;

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
