<?php

namespace Sanoop\Repository\Model;

use Magento\Framework\App\ResourceConnection;
use Sanoop\Repository\Api\CompanyDetailsRepositoryInterface;

class CompanyDetailsRepository implements CompanyDetailsRepositoryInterface
{
    private CompanyDetailsFactory $companyDetailsFactory;
    private ResourceConnection $resourceConnection;

    public function __construct(CompanyDetailsFactory $companyDetailsFactory, ResourceConnection $resourceConnection)
    {
        $this->companyDetailsFactory = $companyDetailsFactory;
        $this->resourceConnection = $resourceConnection;
    }

    /**
     * @param int $id
     * @return CompanyDetails
     */
    public function getById(int $id)
    {
        $company = $this->companyDetailsFactory->create();
        return $company->load($id);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getCompanyDetails(int $id)
    {
        $connection = $this->resourceConnection->getConnection();
        $select = $connection->select()
            ->from(
                ['main_table' => 'company_details'],
            )
            ->join(
                ['sub_table' => 'employees'],
                'main_table.id = sub_table.company_id'
            )->where('main_table.id = ?', $id);

        return $connection->fetchAll($select);
    }
}
