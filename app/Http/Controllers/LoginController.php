<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Shows the login screen for the admin
     *
     * @return Respone
     */
	public function __invoke()
	{
		return view('pages.login');
	}

	/**
	 * Logs the admin in if the login credentials are
	 * satisfied. Redirects to the home page
	 */
	public function login()
	{
        if (!Auth::attempt(request(['name', 'password']))) {
            return back();
        }

        return redirect('/');
	}

    /**
     * Logs the admin out
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
