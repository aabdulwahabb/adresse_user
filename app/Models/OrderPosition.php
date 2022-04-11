<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderPosition extends Model
{
    use HasFactory;

    protected $table = 'auftrag_position';
    public $timestamps = false;


    /**
     * Order position belongs to an order
     *
     * @return BelongsTo
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'auftrag');
    }

    /**
     * Order position has one item
     *
     * @return HasOne
     */
    public function item(): HasOne
    {
        return $this->hasOne(Item::class, 'id', 'artikel');
    }
}
