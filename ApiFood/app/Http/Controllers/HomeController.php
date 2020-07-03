<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index() 
    {
        $data = " You are Authenticated";
        return response()->json(compact('data'),200);

    }
}
