<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Storage extends Model
{
    use HasFactory;
    protected $table = 'lager';
    public $timestamps = false;


    /**
     * @return HasMany
     */
    public function storageBins(): HasMany
    {
        return $this->hasMany(StorageBin::class, 'lager');
    }

}
