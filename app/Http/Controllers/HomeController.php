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

        $userPrompt = trim($validated['prompt']);

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

        //1. Pasamos prompt a la I.A.
        $response = Prism::text()
                ->using('groq', 'llama-3.3-70b-versatile')
                ->withPrompt($fullPrompt)
                ->asText();

        $aiResponse = $response->text;

        //2. Parsear la respuesta

        preg_match('/###\\s*Codigo\\s*(.*?)\\s*###\\s*Explicacion\\s*(.*)/is', $aiResponse, $matches);
        // $matches[0]  Todos el texto que coincidió con el patrón completo.
        // $matches[1]  Solo lo que estaba dentro de los primeros () (código)
        // $matches[2]  Solo que estaba dentro del segundo () (la explicación)


        if( count($matches) === 3 ) {
            $code = trim($matches[1]); // código
            $explanation = trim($matches[2]); // explicación
        }

        // Eliminar el markdown del código.
        $code = preg_replace('/^```[a-z0-9_-]*\\s*/i', '', $code);
        $code = preg_replace('/\\s*```$/', '', $code);
        $code = trim($code);

        return view('home', [
            'code' => $code,
            'explanation' => $explanation
        ]);
    }
}
