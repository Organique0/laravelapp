<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'title', 'excerpt', 'body', 'img_path', 'is_published', 'min_to_read'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function meta()
    {
        return $this->hasOne(PostMeta::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    //protected $table = 'posts';

    //protected $primaryKey = 'id';

    //protected $timestamps = false;

    //protected $dataTime = '';

    //protected $connection = 'sqlite';

    //protected $attributes = [
    //    'is_published' => true
    //];
}
