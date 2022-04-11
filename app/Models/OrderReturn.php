<?php

namespace App\Models;

use App\Scopes\ProjectScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderReturn extends Model
{
    use HasFactory;
    protected $table = 'retoure';
    public $timestamps = false;

    protected $casts = [
        'datum' => 'date',
    ];
    protected static function booted()
    {
        static::addGlobalScope(new ProjectScope());
    }

    public function project() : BelongsTo
    {
        return $this->belongsTo(Project::class, 'projekt');
    }
}
