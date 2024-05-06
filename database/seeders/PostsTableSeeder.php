<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'First Post',
                'excerpt' => 'Summary of post one',
                'body' => 'This is the first post',
                'img_path' => 'Empty',
                'is_published' => false,
                'min_to_read' => 2,
            ],
            [
                'title' => 'First Two',
                'excerpt' => 'Summary of post two',
                'body' => 'This is the second post',
                'img_path' => 'Empty',
                'is_published' => false,
                'min_to_read' => 2,
            ]
        ];

        foreach ($posts as $key => $value) {
            Post::create($value);
        }
    }
}
