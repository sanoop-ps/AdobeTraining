<?php

namespace Sanoop\Assignment4\Api;

interface CompanyDetailsRepositoryInterface
{
    /**
     * @param int $id
     * @return \Sanoop\Assignment4\Api\Data\CompanyDetailsInterface
     */
    public function getById(int $id);

    /**
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Sanoop\Assignment4\Api\Data\CompanyDetailsSearchResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);
}
