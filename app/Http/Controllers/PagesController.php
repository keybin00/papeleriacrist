<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about(){

	//return "about";
	$people = ["fernando","amilcar"];
	//return view("pages.about",['people' => $people]);
	return view("pages.about",compact('people'));
	//return view('pages.about')->with('people',$people);
	//return view('pages.about')->withPeople($people);
    }
}
