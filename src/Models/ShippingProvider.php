<?php

namespace XtendLunar\Features\ShippingProviders\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Lunar\Base\BaseModel;

class ShippingProvider extends BaseModel
{
    use HasFactory;

    protected $guarded = [];

    public function options(): HasMany
    {
        return $this->hasMany(ShippingOption::class, 'provider_id');
    }
}
