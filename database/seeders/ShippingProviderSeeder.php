<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use XtendLunar\Features\ShippingProviders\Models\ShippingProvider;

class ShippingProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            ['name' => 'Free Shipping', 'identifier' => 'free-shipping'],
            ['name' => 'Store Pickup', 'identifier' => 'store-pickup'],
        ])->each(function ($provider) {
            ShippingProvider::query()->create($provider);
        });
    }
}
