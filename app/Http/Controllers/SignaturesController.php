<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignaturesController extends Controller
{
	/**
	 * [index displays guestbook homepage]
	 * 
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function index(){
    	return view("signatures.index");
    }

    /**
     * [create displays guestbook form page]
     * @return Factory|View
     */
   	public function create(){
   		return view("signatures.sign");
   	}
}
