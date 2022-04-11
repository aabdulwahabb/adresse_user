<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CustomsTariffNumber extends Model
{
    use HasFactory;

    protected $table = 'zolltarifnummer';
    public $timestamps = false;

    public function articles(): HasMany
    {
        return $this->hasMany(Item::class, 'zolltarifnummer', 'nummer');
    }

}
