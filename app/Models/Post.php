<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'excerpt', 'body', 'img_path', 'is_published', 'min_to_read'];

    //protected $table = 'posts';

    //protected $primaryKey = 'id';

    //protected $timestamps = false;

    //protected $dataTime = '';

    //protected $connection = 'sqlite';

    //protected $attributes = [
    //    'is_published' => true
    //];
}
