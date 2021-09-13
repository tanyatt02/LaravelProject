<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function menu()
    {
        //dd(\DB::table('users')->get());
        return view('menu');
    }
}
