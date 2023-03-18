<?php

namespace XtendLunar\Features\ShippingProviders\Providers\FreeShipping;

use XtendLunar\Features\ShippingProviders\Base\ShippingProvider;

/**
 * Class FreeShipping
 */
class FreeShipping extends ShippingProvider
{
    protected static string $name = 'Free Shipping';

    protected static string $provider = 'free-shipping';

    protected static bool $showInMenu = false;
}
