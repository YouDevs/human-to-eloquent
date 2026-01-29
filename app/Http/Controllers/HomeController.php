<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $grettings = "Hola fucking, ";

        return view('home', [
            'grettings' => $grettings,
            'name' => request('name')
        ]);
    }
}
