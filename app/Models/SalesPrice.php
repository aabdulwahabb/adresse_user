<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SalesPrice extends Model
{
    use HasFactory;

    protected $table = 'verkaufspreise';
    public $timestamps = false;

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'artikel');
    }
}
