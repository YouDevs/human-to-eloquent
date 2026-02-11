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
            'prompt'        => 'required',
            'migrations'   => 'nullable|string',
        ]);

        // buildPrompt();

        $userPrompt = trim($validated['prompt']);
        $migrations = trim($validated['migrations']);

        //0. Full Prompt
        $fullPrompt = <<<PROMPT
            Responde exactamente con este formato:

            ### Codigo
            (solo el codigo Eloquent o Query Builder en PHP)

            ### Explicacion
            (explicacion tecnica y concreta: menciona filtros, joins, ordenamientos, limites, agregaciones y relaciones; no digas "Laravel", "Eloquent" ni "Query Builder")

            Solo responde en español.

            Solicitud del usuario
            PROMPT;

        $fullPrompt .= "\n".$userPrompt;

        if ($migrations !== "") {
            $fullPrompt .= "\n\nMIGRATIONS:\n $migrations";
        }

        //1. Pasamos prompt a la I.A.
        $response = Prism::text()
                ->using('groq', 'llama-3.3-70b-versatile')
                ->withPrompt($fullPrompt)
                ->asText();

        $aiResponse = $response->text;

        //2. Parsear la respuesta
        preg_match('/###\\s*Codigo\\s*(.*?)\\s*###\\s*Explicacion\\s*(.*)/is', $aiResponse, $matches);

        if( count($matches) === 3 ) {
            $code = trim($matches[1]);
            $explanation = trim($matches[2]);
        } else {
            $code = $aiResponse;
        }

        //3. Eliminar el markdown del código.
        $code = preg_replace('/^```[a-z0-9_-]*\\s*/i', '', $code);
        $code = preg_replace('/\\s*```$/', '', $code);
        $code = trim($code);

        return view('home', [
            'userPrompt'    => $userPrompt,
            'migrations'    => $migrations,
            'code'          => $code,
            'explanation'   => $explanation
        ]);
    }
}
