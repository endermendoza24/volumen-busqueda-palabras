<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeywordVolumeController extends Controller
{
    public function index()
    {
        return view('keyword-volume');
    }

    public function getVolume(Request $request)
    {
        $keyword = $request->input('keyword');

        // Validación básica
        if (!$keyword) {
            return response()->json(['error' => 'La palabra clave no puede estar vacía'], 422);
        }

        try {
            $scriptPath = base_path('scripts/get_volume.py');
            $command = "python {$scriptPath} {$keyword}";

            exec($command, $output, $returnCode);

            if ($returnCode !== 0) {
                // Error al ejecutar el comando
                return response()->json(['error' => 'Error al ejecutar el script de Python'], 500);
            }

            // El resultado del script se encuentra en $output, si es necesario

            // Ejemplo de cómo manejar el resultado si es JSON
            $result = json_decode(implode("\n", $output), true);
            return response()->json(['volume' => $result]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
