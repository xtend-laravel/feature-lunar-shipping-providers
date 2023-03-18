<?php

namespace XtendLunar\Features\ShippingProviders\Providers\StorePickup;

use XtendLunar\Features\ShippingProviders\Base\ShippingProvider;

/**
 * Class StorePickup
 */
class StorePickup extends ShippingProvider
{
    protected static string $name = 'Store Pickup';

    protected static string $provider = 'store-pickup';

    protected static bool $showInMenu = false;
}
