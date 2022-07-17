<?php
namespace Sanoop\Assignment4\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface EmployeesSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \Sanoop\Assignment4\Api\Data\EmployeesInterface[]
     */
    public function getItems();

    /**
     * @param \Sanoop\Assignment4\Api\Data\EmployeesInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
