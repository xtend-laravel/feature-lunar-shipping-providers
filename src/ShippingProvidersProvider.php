<?php

namespace XtendLunar\Features\ShippingProviders;

use CodeLabX\XtendLaravel\Base\XtendFeatureProvider;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Events\LocaleUpdated;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Lunar\Base\ShippingModifiers;
use Lunar\Hub\Facades\Menu;
use Symfony\Component\Finder\SplFileInfo;
use Xtend\Extensions\Lunar\Core\ShippingModifiers\FreeShipping;
use Xtend\Extensions\Lunar\Slots\ShippingSlot;
use XtendLunar\Features\ShippingProviders\Base\ShippingProvider;
use XtendLunar\Features\ShippingProviders\Livewire\Components\ShippingProvidersTable;

class ShippingProvidersProvider extends XtendFeatureProvider
{
    public function register(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/hub.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'adminhub');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    public function boot(): void
    {
        Livewire::component('hub.components.shipping-providers.table', ShippingProvidersTable::class);
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
            $shippingSection = Menu::slot('sidebar')->section('shipping')->name('Shipping');
            $shippingSection->addItem(function ($item) {
                $item->name('Carriers')
                     ->handle('hub.shipping-providers')
                     ->route('hub.shipping-providers.index')
                     ->gate('settings:core')
                     ->icon('truck');
            });

            collect(app(Filesystem::class)->allFiles(__DIR__.'/Providers'))
                ->map(function (SplFileInfo $file): string {
                    $namespace = 'XtendLunar\\Features\\ShippingProviders\\Providers';
                    return (string) Str::of($namespace)
                        ->append('\\', $file->getRelativePathname())
                        ->replace(['/', '.php'], ['\\', '']);
            })
            ->filter(function (string $class): bool {
                return is_subclass_of($class, ShippingProvider::class) && (! (new \ReflectionClass($class))->isAbstract());
            })->each(callback: function (string $class) use ($shippingSection): void {
                $reflection = new \ReflectionClass($class);
                $name = $reflection->getStaticPropertyValue('name');
                $provider = $reflection->getStaticPropertyValue('provider');
                $inMenu = $reflection->getStaticPropertyValue('showInMenu');
                $route = $reflection->getStaticPropertyValue('route');
                if (! $inMenu) {
                    return;
                }

                $shippingSection->addItem(
                    fn ($item) => $item
                        ->name($name)
                        ->handle('hub.ups')
                        ->gate('settings:core')
                        ->route($route)
                );
            });
        });
    }
}
