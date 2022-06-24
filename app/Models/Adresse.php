<?php

namespace App\Models;

use App\Scopes\ProjectScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Arr;

class Adresse extends Model
{
  use HasFactory;

  protected $table = 'adresse';
  public $timestamps = false;
  protected $guarded = [];

  protected $casts = [
      'id' => 'integer',
      'name' => 'string'
  ];


  /**
   * Index for Meilisearch
   *
   * @return string
   */
  public function searchableAs(): string
  {
      return 'adresse_index';
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
          'typ',
          'name',
          'email',
      ]);
  }

  /**
   * Adresse has many  adresse_rollen
   *
   * @return HasMany
   */
  public function adresseRolle(): HasMany
  {
      return $this->hasMany(AdresseRolle::class, 'adresse');
  }

  /**
   * adresse hasMany user
   *
   * @return HasMany
   */
  public function user(): HasMany {
      return $this->hasMany(XentralUser::class, 'adresse');
  }
    /**
     * Adresse has many  projekt
     *
     * @return BelongsTo
     */
    public function projekt(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * apply model scopes
     */
    protected static function booted()
    {
        static::addGlobalScope(new ProjectScope);
    }

}
