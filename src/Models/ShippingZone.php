<?php

namespace XtendLunar\Features\ShippingProviders\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Lunar\Base\BaseModel;

class ShippingZone extends BaseModel
{
    /**
     * @var array
     */
    protected $guarded = [];

    public function locations(): HasMany
    {
        return $this->hasMany(ShippingLocation::class);
    }

    public function options(): HasMany
    {
        return $this->hasMany(ShippingOption::class);
    }
}
