<?php

use Illuminate\Support\Facades\Route;
use Lunar\Hub\Http\Middleware\Authenticate;
use XtendLunar\Features\ShippingProviders\Livewire\Pages\ShippingLocationsIndex;
use XtendLunar\Features\ShippingProviders\Livewire\Pages\ShippingOptionsIndex;
use XtendLunar\Features\ShippingProviders\Livewire\Pages\ShippingProviderShow;
use XtendLunar\Features\ShippingProviders\Livewire\Pages\ShippingProvidersIndex;
use XtendLunar\Features\ShippingProviders\Livewire\Pages\ShippingZonesIndex;

/**
 * Shipping Providers routes.
 */
Route::group([
    'prefix' => config('lunar-hub.system.path', 'hub'),
    'middleware' => ['web', Authenticate::class, 'can:settings:core'],
], function () {
    Route::get('/shipping-providers', ShippingProvidersIndex::class)->name('hub.shipping-providers.index');
    Route::get('/ups/shipping-options', ShippingOptionsIndex::class)->name('hub.ups.shipping-options.index');
    Route::get('/ups/shipping-zones', ShippingZonesIndex::class)->name('hub.ups.shipping-zones.index');
    Route::get('/ups/shipping-locations', ShippingLocationsIndex::class)->name('hub.ups.shipping-locations.index');
});
