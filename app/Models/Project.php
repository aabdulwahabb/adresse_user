<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projekt';
    public $timestamps = false;


    public function tracyUsers(): BelongsToMany
    {
        return $this->belongsToMany(TracyUser::class)->withTimestamps();
    }

    /**
     * A Project has many returns
     *
     * @return HasMany
     */
    public function orderReturns(): HasMany
    {
        return $this->hasMany(OrderReturn::class, 'projekt');
    }

    /**
     * A project has many orders
     *
     * @return HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'projekt');
    }

    /**
     * A project has many goods receipts
     *
     * @return HasMany
     */
    public function goodsReceipts(): HasMany
    {
        return $this->hasMany(GoodsReceipt::class, 'projekt');
    }

    /**
     * A Project has many Items
     *
     * @return HasMany
     */
    public function items(): HasMany
    {
        return $this->hasMany(Item::class, 'projekt');
    }
}
