<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*         $posts = DB::table('posts')
            ->get();

        return view('/blog.index', ['posts' => $posts]); */

        //$posts = Post::orderBy('id', 'desc')->take(10)->get();
        //$posts = Post::where('min_to_read', '!=', 2)->get();

        /*         Post::chunk(25, function ($posts) {
            foreach ($posts as $post) {
                echo $post->title . '<br>';
            }
        }); */

        //$posts = Post::get()->count();

        return view('blog.index', [
            'posts' => Post::orderBy('updated_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*         $post = new Post();
        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        $post->img_path = 'temporary';
        $post->is_published = $request->is_published === 'on';
        $post->min_to_read = $request->min_to_read;
        $post->save(); */

        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'excerpt' => 'required',
            'body' => 'required',
            'img_path' => ['required', 'mimes:png,jpg,jpeg', 'max:5048'],
            'min_to_read' => 'min:0|max:60',
        ]);

        Post::create([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'img_path' => $this->storeImage($request),
            'is_published' => $request->is_published === 'on',
            'min_to_read' => $request->min_to_read,
        ]);

        return redirect(route('blog.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('blog.show', [
            'post' => Post::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('blog.edit', [
            'post' => Post::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255|unique:posts,title',
            'excerpt' => 'required',
            'body' => 'required',
            'img_path' => ['mimes:png,jpg,jpeg', 'max:5048'],
            'min_to_read' => 'min:0|max:60',
        ]);


        Post::where('id', $id)->update($request->except([
            '_token', '_method'
        ]));

        return redirect(route('blog.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function storeImage($request)
    {
        $newImageName = uniqid() . '.' . $request->title . '.' . $request->image->extension();

        return $request->image->move(public_path('images'), $newImageName);
    }
}
