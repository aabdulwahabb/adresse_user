<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StorageBin extends Model
{
    use HasFactory;

    protected $table = 'lager_platz';
    public $timestamps = false;

    /**
     * @return BelongsTo
     */
    public function storage(): BelongsTo
    {
        return $this->belongsTo(Storage::class);
    }

    /**
     * @return BelongsTo
     */
    public function storageBinContents(): BelongsTo
    {
        return $this->belongsTo(StorageBinContent::class);
    }
}
