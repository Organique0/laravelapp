<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id', 'meta_descriptions', 'meta_keywords', 'meta_robots'
    ];
}
