<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;

class AutoCompleteController extends Controller

{

    public function index()

    {

    	return view('autocomplete');

    }

    public function ajaxData(Request $request){

        $query = $request->get('query','');        

        $posts = Customer::where('name','LIKE','%'.$query.'%')->get();        

        return response()->json($posts);

	}

}