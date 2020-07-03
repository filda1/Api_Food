<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() 
    {
        $data = "Authenticated";
        return response()->json(compact('data'),200);

    }

}
