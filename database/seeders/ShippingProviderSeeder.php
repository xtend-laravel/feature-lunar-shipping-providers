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
            ['name' => 'Free Shipping'],
            ['name' => 'Store Pickup'],
            ['name' => 'UPS'],
        ])->each(function ($provider) {
            ShippingProvider::create($provider);
        });
    }
}
