<?php

namespace App\Models;

use App\Scopes\ProjectScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Arr;

class Team extends Model
{
    use HasFactory;

    protected $table = 'team';
    public $timestamps = false;
    protected $guarded = [];

    protected $casts = [
        'name' => 'string'
    ];


    /**
     * Index for Meilisearch
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'team_index';
    }

    /**
     * Fields to index
     *
     * @return array
     */
    public function toSearchableArray(): array
    {
        $array = $this->toArray();

        return Arr::only($array, [
            'id',
            'name',
            'icon',
            'active',
        ]);
    }

}
