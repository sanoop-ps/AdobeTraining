<?php

namespace Sanoop\Repository\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface CompanyDetailsSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return CompanyDetailsInterface
     */
    public function getItems(): CompanyDetailsInterface;

    /**
     * @param array $items
     * @return CompanyDetailsSearchResultInterface
     */
    public function setItems(array $items);
}
