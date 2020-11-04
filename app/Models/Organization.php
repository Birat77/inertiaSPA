<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Organization extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'city',
        'address',
        'phone',
        'region',
        'country',
        'postal_code'
    ];

    /**
     * @param Builder $query
     * @param string  $searchQuery
     *
     * @return Builder
     */
    public function scopeSearch(Builder $query, string $searchQuery): Builder
    {
        return $query->where('name', 'ilike', "%" . $searchQuery . "%");
    }
}
