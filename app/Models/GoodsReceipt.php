<?php

namespace App\Models;

use App\Scopes\ProjectScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GoodsReceipt extends Model
{
    use HasFactory;

    protected $table = 'bestellung';
    public $timestamps = false;

    /**
     * GoodsReceipt has multiple positions
     *
     * @return HasMany
     */
    public function goodsReceiptPositions(): HasMany
    {
        return $this->hasMany(GoodsReceiptPosition::class, 'bestellung');
    }

    /**
     * GoodsReceipt belongs to a project
     *
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'projekt');
    }

    public function status(): string
    {
        if ($this->status == 'storniert') {
            return 'canceled';
        }

        if ($this->status == 'abgeschlossen') {
            return 'done';
        }

        if ($this->goodsReceiptPositions->sum('geliefert') > 0)
        {
            return 'processing';
        }

        return 'open';
    }

    /**
     * apply model scopes
     */
    protected static function booted()
    {
        static::addGlobalScope(new ProjectScope);
    }
}
