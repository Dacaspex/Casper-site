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
		return view('pages.viewPost')->with('post', $post);
	}

}
