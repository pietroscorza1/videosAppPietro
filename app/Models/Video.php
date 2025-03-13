<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Video extends Model
{
    /** @use HasFactory<\Database\Fatories\VideoFactory> */
    use HasFactory;
    protected $dates = ['published_at'];

    protected $fillable = [
        'title',
        'description',
        'url',
        'published_at',
        'next',
        'series_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function nextVideo()
    {
        return $this->belongsTo(Video::class, 'next');
    }


    public function getFormattedPublishedAtAttribute()
    {
        if (!$this->published_at) {
            return 'Fecha no disponible';
        }

        return Carbon::parse($this->published_at)->locale('es')->translatedFormat('j \d\e F \d\e Y');
    }

    public function getFormattedForHumansPublishedAtAttribute()
    {
        return Carbon::parse($this->published_at)->diffForHumans();
    }

    public function getPublishedAtTimestampAttribute()
    {
        return Carbon::parse($this->published_at)->timestamp;
    }
}
