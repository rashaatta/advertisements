<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisementImage extends Model
{
    use HasFactory;

    protected $table = 'advertisement_images';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'advertisement_id',
        'file_name',
        'mime_type',
        'size',
    ];

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class);
    }
}
