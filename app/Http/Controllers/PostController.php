<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    /**
     * Shows the index page for posts
     *
     * @return Respone
     */
    public function __invoke() {
        $posts = Post::orderBy('created_at', 'desc')
            ->get();
        return view('pages.posts.index')->with('posts', $posts);
    }

    /**
     * Shows a single post
     *
     * @return Respone
     */
	public function show($id)
	{
		$post = Post::find($id);
		return view('pages.posts.view')->with('post', $post);
	}

    /**
     * Shows the create page
     *
     * @return Respone
     */
    public function create()
    {
        if (Auth::check()) {
            return view('pages.posts.create');
        } else {
            return redirect('/');
        }
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required|unique:posts|max:200',
            'description' => 'required|max:300',
        ]);

        $post = new Post;
        $post->title = request('title');
        $post->description = request('description');
        $post->body = request('body');
        $post->save();

        return redirect('/');
    }

}
