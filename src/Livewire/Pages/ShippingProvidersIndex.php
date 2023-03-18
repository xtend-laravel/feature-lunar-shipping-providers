<?php

namespace XtendLunar\Features\ShippingProviders\Livewire\Pages;

use Illuminate\View\View;
use Livewire\Component;
use Lunar\Hub\Http\Livewire\Traits\Notifies;
use Lunar\Hub\Http\Livewire\Traits\WithLanguages;

class ShippingProvidersIndex extends Component
{
    use Notifies;
    use WithLanguages;

    public function render(): View
    {
        return view('adminhub::livewire.pages.shipping-providers')
            ->layout('adminhub::layouts.app', [
                'title' => __('Shipping Providers'),
            ]);
    }
}
