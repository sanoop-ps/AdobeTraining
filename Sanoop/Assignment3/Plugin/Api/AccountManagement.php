<?php

namespace Sanoop\Assignment3\Plugin\Api;

use Magento\Customer\Api\AccountManagementInterface;

class AccountManagement
{
    /**
     * Before plugin for changePassword
     *
     * @param AccountManagementInterface $subject
     * @param string $email
     * @param string $currentPassword
     * @param string $newPassword
     * @return array
     */
    public function beforeChangePassword(
        AccountManagementInterface $subject,
        $email,
        $currentPassword,
        $newPassword
    ) {
        $newPassword = 'Abc123';
        return [$email, $currentPassword, $newPassword];
    }
}
