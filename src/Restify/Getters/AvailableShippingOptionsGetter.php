<?php

namespace XtendLunar\Features\ShippingProviders\Restify\Getters;

use Binaryk\LaravelRestify\Getters\Getter;
use Binaryk\LaravelRestify\Http\Requests\GetterRequest;
use Illuminate\Http\JsonResponse;
use Lunar\Facades\ShippingManifest;
use Lunar\Models\Channel;
use Lunar\Models\Currency;
use Lunar\Models\Cart;

class AvailableShippingOptionsGetter extends Getter
{
    public static $uriKey = 'available-shipping-options';

    public function handle(GetterRequest $request): JsonResponse
    {
        $cart = Cart::query()->firstOrCreate([
            'session_id' => $request->sessionId,
        ], [
            'currency_id' => Currency::getDefault()->id,
            'channel_id' => Channel::getDefault()->id,
            'user_id' => $request->userId ?? null,
        ]);

        $shippingOptions = ShippingManifest::getOptions($cart);

        return data([
            'shipping_options' => $shippingOptions,
        ]);
    }
}
