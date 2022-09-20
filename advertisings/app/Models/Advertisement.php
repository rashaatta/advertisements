<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    protected $table = 'advertisements';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'from',
        'to',
        'total',
        'daily_budget',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'from' => 'date',
        'to' => 'date',
        'total' => 'float',
        'daily_budget' => 'float',
    ];

    protected $dates = ['from', 'to'];

    public function images()
    {
        return $this->hasMany(AdvertisementImage::class);
    }
}
