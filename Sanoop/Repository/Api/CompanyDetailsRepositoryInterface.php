<?php

namespace Sanoop\Repository\Api;

interface CompanyDetailsRepositoryInterface
{
    /**
     * @param int $id
     * @return mixed
     */
    public function getById(int $id);

    /**
     * @param int $id
     * @return mixed
     */
    public function getCompanyDetails(int $id);
}
