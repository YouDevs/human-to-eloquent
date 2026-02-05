<?php

namespace App\Http\Controllers;

use Prism\Prism\Facades\Prism;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function postPrompt(Request $request)
    {
        $validated = $request->validate([
            'prompt' => 'required',
        ]);

        $prompt = $validated['prompt'];

        // Pasamos prompt a la I.A.
        $response = Prism::text()
                ->using('groq', 'llama-3.3-70b-versatile')
                ->withPrompt($prompt)
                ->asText();

        // dd($response->text);

        return view('home', ['response' => $response->text]);
    }
}
