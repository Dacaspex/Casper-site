<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

    /**
     * Shows the home page
     *
     * @return Respone
     */
	public function __invoke($id)
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
        return view('pages.posts.create');
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
