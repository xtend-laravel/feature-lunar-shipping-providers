<?php

namespace XtendLunar\Features\ShippingProviders\Providers\Ups;

use XtendLunar\Features\ShippingProviders\Base\ShippingProvider;

/**
 * Class UpsProvider
 */
class UpsProvider extends ShippingProvider
{
    protected static string $name = 'UPS Carrier';

    protected static string $provider = 'ups';

    protected static bool $showInMenu = true;

    protected static string $route = 'hub.ups.shipping-options.index';
}
