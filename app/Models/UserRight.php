<?php

namespace App\Models;

use App\Scopes\ProjectScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Arr;


class UserRight extends Model
{
  use HasFactory;

  protected $table = 'userrights';
  public $timestamps = false;
  protected $guarded = [];

  protected $casts = [
      'username' => 'string'
  ];


  /**
   * Index for Meilisearch
   *
   * @return string
   */
  public function searchableAs(): string
  {
      return 'user_index';
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
          'action',
          'module',
          'permission',
          'user',
      ]);
  }

  /**
   * Userrights has one user
   *
   * @return BelongsTo
   */
  public function user(): BelongsTo {
      return $this->belongsTo(XentralUser::class);
  }

    /**
     * apply model scopes
     */
    protected static function booted()
    {
        static::addGlobalScope(new ProjectScope);
    }

}
