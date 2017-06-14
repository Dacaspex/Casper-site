<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    
    /**
     * Shows the home page
     * 
     * @return Respone
     */
	public function __invoke()
	{
		
		$posts = Post::orderBy('created_at', 'desc')
					->take(5)
					->get();

		return view('pages.home')->with('posts', $posts);
	}

}
