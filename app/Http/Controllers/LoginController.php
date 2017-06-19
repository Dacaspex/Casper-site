<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
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
		return null;
	}
}
