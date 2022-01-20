<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'idcategoryname',
        'question',
        'A',
        'B',
        'C',
        'correctanswer',
        'file',
    ];

}
