<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $table = 'home'; // explicitly define table name if singular

    protected $fillable = [
        'background_picture',
        'title1',
        'title1_content',
        'title2',
        'title2_content',
        'button1_name',
        'button1_url',
        'background_picture2',
        'title3',
        'title3_content',
        'button2_name',
        'button2_url'
    ];
}
