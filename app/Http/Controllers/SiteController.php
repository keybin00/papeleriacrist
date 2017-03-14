<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller{
	public function login(){
		return view("site.login");
	}
	public function verify(){
		//echo var_dump($_POST);
		return view("site.index");
	}
	public function index(){
		return view("site.index");	
	}
}
