<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeywordVolumeController extends Controller
{
    public function index()
    {
        return view('keyword-volume');
    }

    public function obtenerVolumen(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'keyword' => 'required|string|max:255' //  Limite a la palabra clave
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 422);
        }

        $keyword = $request->input('keyword');
        $apiKey = env('GOOGLE_CUSTOM_SEARCH_API_KEY'); //  Variable de entorno, del api key de Google
        $searchEngineId = env('GOOGLE_SEARCH_ENGINE_ID');

        try {
            $scriptPath = base_path('scripts/get_volume.py');
            $command = escapeshellcmd("python {$scriptPath} " . escapeshellarg($keyword) . " " . escapeshellarg($apiKey) . " " . escapeshellarg($searchEngineId));

            exec($command, $output, $returnCode);

            if ($returnCode !== 0) {
                return response()->json(['error' => 'Error al ejecutar el script de Python'], 500);
            }

            $result = json_decode(implode("\n", $output), true);
            return response()->json(['volume' => $result]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}