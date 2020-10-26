<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function __construct(){
    	// $this->middleware('guest');
    	// $this->middleware(['auth' => 'verified']);
    	$this->middleware(['auth']);
	}

    public function index(){
    	return view('auth.login');
    }
}
