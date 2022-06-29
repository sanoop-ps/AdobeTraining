<?php
namespace Sanoop\Assignment3\Plugin\Api;

class AccountManagement
{
    public function __construct()
    {
    }

    public function beforeChangePassword(
        \Magento\Customer\Api\AccountManagementInterface $subject,
        $email,
        $currentPassword,
        $newPassword
    ) {
        $newPassword='Abc123';
        return [$email, $currentPassword, $newPassword];
    }

}
