<?php

namespace XtendLunar\Features\ProductFeatures;

use CodeLabX\XtendLaravel\Base\XtendFeatureProvider;
use Illuminate\Foundation\Events\LocaleUpdated;
use Illuminate\Support\Facades\Event;
use Livewire\Livewire;
use Lunar\Base\ShippingModifiers;
use Lunar\Hub\Facades\Menu;
use Xtend\Extensions\Lunar\Core\ShippingModifiers\FreeShipping;
use Xtend\Extensions\Lunar\Slots\ShippingSlot;

class ShippingProvidersProvider extends XtendFeatureProvider
{
    public function register(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/hub.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'adminhub');
    }

    public function boot(): void
    {
        Livewire::component('hub.orders.slots.shipping-slot', ShippingSlot::class);
        $shippingModifiers = resolve(ShippingModifiers::class);
        $shippingModifiers->add(FreeShipping::class);

        // @todo Move this to XtendFeatureProvider to check if method exists
        $this->registerWithSidebarMenu();
    }

    protected function registerWithSidebarMenu(): void
    {
        // Note: We listen to LocaleUpdated event to make sure translations are loaded and menu items are all available
        Event::listen(LocaleUpdated::class, function () {
            Menu::slot('sidebar')->section('shipping')->addItem(function ($item) {
                $item->name('Providers')
                     ->handle('hub.shipping-providers')
                     ->route('hub.shipping-providers.index')
                     ->gate('settings:core')
                     ->icon('shipping-box-01');
            });
        });
    }
}
