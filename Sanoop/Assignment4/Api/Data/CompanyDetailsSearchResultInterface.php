<?php
namespace Sanoop\Assignment4\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface CompanyDetailsSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \Sanoop\Assignment4\Api\Data\CompanyDetailsInterface[]
     */
    public function getItems();

    /**
     * @param \Sanoop\Assignment4\Api\Data\CompanyDetailsInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
