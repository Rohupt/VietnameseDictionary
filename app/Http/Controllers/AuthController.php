<?php

namespace App\Http\Controllers;

use Redirect;
use Auth;
use Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Html\HtmlServiceProvider;
use Illuminate\Support\Facades\Request;


class AuthController extends BaseController
  {
  public function showLogin()
    {
    // Form View
    return view('signup');
    }

  public function doLogout()
    {
    Auth::logout(); // logging out user
    return Redirect::to('signup'); // redirection to login screen
    }

  public function doLogin()
	{
		// validate the info, create rules for the inputs
		$rules = array(
		    'email'    => 'required|email', // make sure the email is an actual email
		    'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Request::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
		    return Redirect::to('signin')
		        ->withErrors($validator) // send back all errors to the login form
		        ->withInput(Request::except('password')); // send back the input (not the password) so that we can repopulate the form
		} 
		else {

		    // create our user data for the authentication
		    $userdata = array(
		        'email'     => Input::get('user'),
		        'password'  => Input::get('pass')
		    );

		    // attempt to do the login
		    if (Auth::attempt($userdata)) {

		        // validation successful!
		        // redirect them to the secure section or whatever
		        // return Redirect::to('secure');
		        // for now we'll just echo success (even though echoing in a controller is bad)
		        echo 'SUCCESS!';

		    } else {        

		        // validation not successful, send back to form 
		        return Redirect::to('signin');

		    }

		}
	}
	}
