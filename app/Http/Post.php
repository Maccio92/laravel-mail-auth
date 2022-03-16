<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'name',
        'html_url',
        'created_at',
        'updated_at'
    ];
}
