<?php

namespace Sanoop\Repository\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class CompanyDetails extends AbstractDb
{
    /**
     * Initialize resource model.
     */
    public function _construct()
    {
        $this->_init('company_details', 'id');
    }
}
