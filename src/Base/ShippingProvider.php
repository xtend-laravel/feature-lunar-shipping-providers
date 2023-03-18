<?php

namespace XtendLunar\Features\ShippingProviders\Base;

use Lunar\Base\ShippingModifier;

abstract class ShippingProvider extends ShippingModifier
{
    protected static string $name;

    protected static string $provider;

    // abstract protected function rules(): array;

    // abstract protected function rates(): array;
}
