<?php

namespace App\Models;

use App\Scopes\ProjectScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DeliveryNote extends Model
{
    use HasFactory;

    protected $table = 'lieferschein';
    public $timestamps = false;

    /**
     * Delivery note belongs to a project
     *
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'projekt');
    }

    /**
     * Delivery note belongs to an order
     *
     * @return BelongsTo
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'auftragid');
    }

    /**
     * Delivery note has many delivery note positions
     *
     * @return HasMany
     */
    public function deliveryNotePositions(): HasMany
    {
        return $this->hasMany(DeliveryNotePosition::class, 'lieferschein');
    }

    /**
     * apply model scopes
     */
    protected static function booted()
    {
        static::addGlobalScope(new ProjectScope);
    }

}
