<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Video extends Model
{
    /** @use HasFactory<\Database\Factories\VideoFactory> */
    use HasFactory;
    protected $dates = ['published_at'];

    protected $fillable = [
        'title',
        'description',
        'url',
        'published_at',
        'next',
        'series_id'
    ];
    public function nextVideo()
    {
        return $this->belongsTo(Video::class, 'next');
    }

    public function getFormattedPublishedAtAttribute()
    {
        return Carbon::parse($this->published_at)->translatedFormat('j \d\e F \d\e Y');
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
