<?php
declare(strict_types=1);

namespace ClaudioFerraro\DisableRegistration\Plugin;

use Magento\Customer\Model\Registration;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class RegistrationPlugin
{
    const XML_PATH_DISABLE_CUSTOMER_REGISTRATION = 'customer/create_account/disable_customer_registration';

    public function __construct(
        protected ScopeConfigInterface $scopeConfig
    ) {
    }

    /**
     * Check if registration is allowed
     */
    public function afterIsAllowed(Registration $subject): bool
    {
        return !$this->scopeConfig->isSetFlag(
            self::XML_PATH_DISABLE_CUSTOMER_REGISTRATION,
            ScopeInterface::SCOPE_STORE
        );
    }
}
