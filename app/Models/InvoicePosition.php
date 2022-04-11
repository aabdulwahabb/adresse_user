<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class InvoicePosition extends Model
{
    use HasFactory;

    protected $table = 'rechnung_position';
    public $timestamps = false;

    /**
     * Invoice position belongs to an invoice
     *
     * @return BelongsTo
     */
    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class, 'rechnung');
    }

    /**
     * Invoice position has many items
     *
     * @return HasOne
     */
    public function item(): HasOne
    {
        return $this->hasOne(Item::class, 'id', 'artikel');
    }
}
