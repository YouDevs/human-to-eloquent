<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function form(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        return redirect('/')->with('success', 'Tu solicitud ha sido recibida');
    }
}
