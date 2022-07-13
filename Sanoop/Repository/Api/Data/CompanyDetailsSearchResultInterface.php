<?php
declare(strict_types=1);

namespace Sanoop\Repository\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface CompanyDetailsSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return CompanyDetailsInterface[]
     */
    public function getItems();

    /**
     * @param CompanyDetailsInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
