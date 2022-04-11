<?php

namespace App\Models;

use App\Scopes\ProjectScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Arr;
use Laravel\Scout\Searchable;

class Order extends Model
{
    use HasFactory;

    protected $table = 'auftrag';
    public $timestamps = false;

    protected $casts = [
        'belegnr' => 'string'
    ];


    /**
     * Index for Meilisearch
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'orders_index';
    }

    /**
     * Fields to index
     *
     * @return array
     */
    public function toSearchableArray(): array
    {
        $array = $this->toArray();

        return Arr::only($array, [
            'id',
            'belegnr',
            'name',
            'internet',
            'freitext',
            'internebemerkung',
            'strasse',
            'adresszusatz',
            'kundennummer',
        ]);
    }

    /**
     * Order belongs to a project
     *
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'projekt');
    }

    /**
     * Order has many order positions
     *
     * @return HasMany
     */
    public function orderPositions(): HasMany
    {
        return $this->hasMany(OrderPosition::class, 'auftrag');
    }

    /**
     * Order has many delivery notes
     *
     * @return HasMany
     */
    public function DeliveryNotes(): HasMany {
        return $this->hasMany(DeliveryNote::class, 'auftragid');
    }

    /**
     * Order has many invoices
     *
     * @return HasMany
     */
    public function Invoices(): HasMany {
        return $this->hasMany(Invoice::class, 'auftragid');
    }


    /**
     * apply model scopes
     */
    protected static function booted()
    {
        static::addGlobalScope(new ProjectScope);
    }

}
