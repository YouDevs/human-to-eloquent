<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        // $categories = DB::table('categories')->get();
        $categories = Category::where('is_active', 1)->get();

        Category::create(); // C
        Category::all(); // R
        Category::update(); // U
        Category::delete(); // D

        return view('home', ['categories' => $categories]);
    }

    public function form(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        return redirect('/')->with('success', 'Tu solicitud ha sido recibida');
    }
}
