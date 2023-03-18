<?php

namespace XtendLunar\Features\ShippingProviders\Base;

use Lunar\Base\ShippingModifier;

abstract class ShippingProvider extends ShippingModifier
{
    protected static string $name;

    protected static string $provider;

    protected static bool $showInMenu = false;

    protected static string $route;
}
