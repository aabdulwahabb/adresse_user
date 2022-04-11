<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StorageBinContent extends Model
{
    use HasFactory;

    protected $table = 'lager_platz_inhalt';
    public $timestamps = false;

    /**
     * @return HasOne
     */
    public function storageBin(): HasOne
    {
        return $this->HasOne(StorageBin::class);
    }

    /**
     * @return HasMany
     */
    public function storageMovements(): HasMany
    {
        return $this->hasMany(StorageMovement::class);
    }

    /**
     * @return BelongsTo
     */
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'artikel');
    }

}
