<?php

namespace XtendLunar\Features\ShippingProviders\Restify;

use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use XtendLunar\Features\ShippingProviders\Models\ShippingProvider;
use XtendLunar\Features\ShippingProviders\Restify\Getters\AvailableShippingOptionsGetter;
use XtendLunar\Features\ShippingProviders\Restify\Presenters\ShippingProviderPresenter;
use XtendLunar\Addons\RestifyApi\Restify\Repository;

class ShippingProviderRepository extends Repository
{
    public static string $model = ShippingProvider::class;

    public static string $presenter = ShippingProviderPresenter::class;

    public static array|bool $public = true;

    public function getters(RestifyRequest $request): array
    {
        return [
            AvailableShippingOptionsGetter::make(),
        ];
    }
}
