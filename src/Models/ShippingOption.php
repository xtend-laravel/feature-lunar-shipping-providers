<?php

namespace XtendLunar\Features\ShippingProviders\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Lunar\Base\BaseModel;

class ShippingOption extends BaseModel
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var array
     */
    protected $casts = [
        'data' => 'array',
    ];

    public function zone(): BelongsTo
    {
        return $this->belongsTo(ShippingZone::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(ShippingLocation::class);
    }
}
