<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
