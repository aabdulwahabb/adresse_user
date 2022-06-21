<?php

namespace App\Models;

use App\Scopes\ProjectScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Arr;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;




class XentralUser extends Model implements Searchable
{
  use HasFactory;

 protected $table = 'user';
 public $timestamps = false;
 protected $guarded = [];

 protected $hidden = [
   'password',
   'repassword',
   'remember_token'
 ];

 protected $casts = [
     'username' => 'string',
     'id' => 'integer'
 ];

    protected $fillable = [
        'username', 'adresse'
    ];

    public function getSearchResult(): SearchResult
    {
        $url = route('users.index', $this->id);

        return new SearchResult(
            $this->username,
            $url
        );
    }


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
         'type',
         'username',
         'adresse',
         'projekt',
     ]);
 }

 /**
  * User has many  projekt
  *
  * @return HasMany
  */
 public function projekt(): HasMany
 {
     return $this->hasMany(Project::class, 'projekt');
 }

 /**
  * User has many  userrights
  *
  * @return HasMany
  */
 public function userright(): HasMany
 {
     return $this->hasMany(UserRight::class, 'user');
 }

 /**
  * User BelongsTo adresse
  *
  * @return BelongsTo
  */
 public function adresse(): BelongsTo {
     return $this->belongsTo(Adresse::class, 'adresse');
 }

    /**
     * apply model scopes
     */
    protected static function booted()
    {
        static::addGlobalScope(new ProjectScope);
    }
}
