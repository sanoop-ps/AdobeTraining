<?php
namespace Sanoop\Assignment4\Api;

interface EmployeesRepositoryInterface
{
    /**
     * Get employees details by id
     *
     * @param int $id
     * @return \Sanoop\Assignment4\Api\Data\EmployeesInterface[]
     */
    public function getById(int $id);

    /**
     * Get employees details with filtered
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Sanoop\Assignment4\Api\Data\EmployeesSearchResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);
}
