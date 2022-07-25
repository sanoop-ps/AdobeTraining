<?php

namespace Sanoop\Assignment4\Api;

interface CompanyDetailsRepositoryInterface
{
    /**
     * Get Company details by id
     *
     * @param int $id
     * @return \Sanoop\Assignment4\Api\Data\CompanyDetailsInterface
     */
    public function getById(int $id);

    /**
     * Get Company details with filtered
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Sanoop\Assignment4\Api\Data\CompanyDetailsSearchResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * To Save Company Details
     *
     * @param $companyDetails
     * @return bool
     */
    public function save($companyDetails);

    /**
     *To Delete Company details
     *
     * @param int $companyDetailsId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($companyDetailsId);
}
