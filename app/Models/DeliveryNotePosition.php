<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DeliveryNotePosition extends Model
{
    use HasFactory;

    protected $table = 'lieferschein_position';
    public $timestamps = false;

    /**
     * Delivery note position belongs to an order
     *
     * @return BelongsTo
     */
    public function deliveryNote(): BelongsTo
    {
        return $this->belongsTo(DeliveryNote::class, 'lieferschein');
    }

    /**
     * Delivery note position has many items
     *
     * @return HasOne
     */
    public function item(): HasOne
    {
        return $this->hasOne(Item::class, 'id', 'artikel');
    }
}
