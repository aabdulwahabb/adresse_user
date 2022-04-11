<?php

namespace App\Models;

use App\Scopes\ProjectScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'rechnung';
    public $timestamps = false;

    /**
     * Invoice belongs to a project
     *
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'projekt');
    }

    /**
     * Invoice belongs to an order
     *
     * @return BelongsTo
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'auftragid');
    }

    /**
     * Invoice has many invoice positions
     *
     * @return HasMany
     */
    public function invoicePositions(): HasMany
    {
        return $this->hasMany(InvoicePosition::class, 'rechnung');
    }

    /**
     * apply model scopes
     */
    protected static function booted()
    {
        static::addGlobalScope(new ProjectScope);
    }
}
