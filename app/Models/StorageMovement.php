<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StorageMovement extends Model
{
    use HasFactory;
    protected $table = 'lager_bewegung';
    public $timestamps = false;

    /**
     * @return HasOne
     */
    public function storageBinContents(): HasOne
    {
        return $this->hasOne(StorageBinContent::class);
    }
}
