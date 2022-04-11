<?php

namespace App\Models;

use App\Scopes\ItemDeletedScope;
use App\Scopes\ProjectScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Laravel\Scout\Searchable;

class Item extends Model
{
    use HasFactory;

    protected $table = 'artikel';
    public $timestamps = false;

    /**
     * Index for Meilisearch
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'items_index';
    }

    /**
     * An item belongs to a project
     *
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'projekt');
    }

    /**
     * An item has physical stock
     *
     * @return HasMany
     */
    public function storageBinContent(): HasMany
    {
       return $this->hasMany(StorageBinContent::class,'artikel');
    }

    /**
     * Return the sum of physically available stock for this item
     *
     * @return float
     */
    public function physicalStock(): float
    {
        if ($this->lagerartikel == 0) {
            return ($this->pseudolager ?: 0.0);
        }
        return $this->storageBinContent->sum('menge', 0.0000);
    }

    /**
     * An item has reserved stock
     *
     * @return HasMany
     */
    public function reserved(): HasMany
    {
        return $this->hasMany(StorageReserved::class, 'artikel');
    }

    /**
     * Return the reserved stock for this item
     *
     * @return float
     */
    public function reservedStock(): float
    {
        return $this->reserved->sum('menge', 0.0000);
    }

    /**
     * Return the available stock for this item
     *
     * @return float
     */
    public function availableStock(): float
    {
        return ($this->physicalStock() - $this->reservedStock());
    }

    /**
     * Return the incomming goods for this item
     */
    public function incomingStock(): float
    {
        return 0;
    }

    /**
     * If the item is a parts list, it can have children
     *
     * @returns
     */
    public function children(): BelongsToMany
    {
        return $this->belongsToMany(
            self::class,
            'stueckliste',
            'stuecklistevonartikel',
            'artikel',
            );
    }

    /**
     * Items can be part of a parts list
     *
     * @return BelongsToMany
     */
    public function parent(): BelongsToMany
    {
        return $this->belongsToMany(
            self::class,
            'stueckliste',
            'artikel',
            'stuecklistevonartikel',
        );
    }


    /**
     * An item can be in a storage bin
     *
     * @return HasManyThrough
     */
    public function storageBins(): HasManyThrough
    {
        return $this->hasManyThrough(
            StorageBin::class,
            StorageBinContent::class,
            'artikel',
            'id',
            'id',
            'lager_platz',
        );
    }

    /**
     * An item can be reserved for orders
     *
     * @return HasManyThrough
     */
    public function reservedOrders(): HasManyThrough
    {
        return $this->hasManyThrough(
            OrderPosition::class,
            StorageReserved::class,
            'artikel',
            'id',
            'id',
            'parameter'
        );
    }

    public function salesPrices(): HasMany
    {
        return $this->hasMany(Item::class, 'artikel');
    }

    public function purchasePrices(): HasMany
    {
        return $this->hasMany(Item::class, 'artikel');
    }

    public function customsTariffNumber(): BelongsTo
    {
        return $this->belongsTo(CustomsTariffNumber::class, 'zolltarifnummer', 'nummer');
    }

    /**
     * Apply model scopes
     */
    protected static function booted()
    {
        static::addGlobalScope(new ProjectScope);
        static::addGlobalScope(new ItemDeletedScope);
    }
}
