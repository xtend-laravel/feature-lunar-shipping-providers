<?php

use Illuminate\Support\Facades\Route;
use Lunar\Hub\Http\Middleware\Authenticate;
use XtendLunar\Features\ShippingProviders\Livewire\Pages\ShippingProviderShow;
use XtendLunar\Features\ShippingProviders\Livewire\Pages\ShippingProvidersIndex;

/**
 * Shipping Providers routes.
 */
Route::group([
    'prefix' => config('lunar-hub.system.path', 'hub'),
    'middleware' => ['web', Authenticate::class, 'can:settings:core'],
], function () {
    Route::get('/shipping-providers', ShippingProvidersIndex::class)->name('hub.shipping-providers.index');
    Route::get('/shipping-providers/ups', ShippingProvidersIndex::class)->name('hub.shipping-provider');
});
