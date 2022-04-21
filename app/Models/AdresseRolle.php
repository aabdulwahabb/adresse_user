<?php

namespace App\Models;

use App\Scopes\ProjectScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Arr;


class AdresseRolle extends Model
{
  use HasFactory;

  protected $table = 'adresse_rolle';
  public $timestamps = false;
  protected $guarded = [];

  protected $casts = [
      'subjekt' => 'string'
  ];


  /**
   * Index for Meilisearch
   *
   * @return string
   */
  public function searchableAs(): string
  {
      return 'adresse_rolle_index';
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
          'objekt',
          'adresse',
          'projekt',
      ]);
  }

  /**
   * Adresse_rolle has many  projekt
   *
   * @return BelongsTo
   */
  public function projekt(): BelongsTo
  {
      return $this->belongsTo(Project::class);
  }

  /**
   * Adresse_rolle has one adresse
   *
   * @return BelongsTo
   */
  public function adresse(): BelongsTo {
      return $this->belongsTo(Adresse::class);
  }
    /**
     * apply model scopes
     */
    protected static function booted()
    {
        static::addGlobalScope(new ProjectScope);
    }

}
