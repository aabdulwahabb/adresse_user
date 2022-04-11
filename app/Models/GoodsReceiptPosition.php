<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class GoodsReceiptPosition extends Model
{
    use HasFactory;

    protected $table = 'bestellung_position';
    public $timestamps = false;

    /**
     * Positions belongs to a receipt
     *
     * @return HasOne
     */
    public function goodsReceipt(): HasOne
    {
        return $this->hasOne(GoodsReceipt::class, 'bestellung');
    }
}
