<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Zajecia_praktyczne extends Model
{
    use HasFactory,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'practice_lessons';
    protected $fillable = [
        'dayValue',
        'statTime',
        'endTime',
        'placeValue',
        'categoryValue',
    ];

}