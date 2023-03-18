<?php

namespace XtendLunar\Features\ShippingProviders\Livewire\Pages;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class ShippingZonesIndex extends Component
{
    public function render(): View
    {
        return view('adminhub::livewire.pages.shipping-zones.index')
            ->layout('adminhub::layouts.app', [
                'title' => __('Shipping Zones'),
            ]);
    }
}
