<?php

namespace Sanoop\Repository\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Employees extends AbstractDb
{
    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('employees', 'id');
    }
}
