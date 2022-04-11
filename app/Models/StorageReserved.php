<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StorageReserved extends Model
{
    use HasFactory;

    protected $table = 'lager_reserviert';
    public $timestamps = false;

    /**
     * Reservation belongs to an item
     *
     * @return BelongsTo
     */
    public function items(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'artikel');
    }

}
