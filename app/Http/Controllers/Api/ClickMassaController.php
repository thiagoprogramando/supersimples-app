<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClickMassaController extends Controller {
    
    public function webhook(Request $request) {

        // Obtém a data atual formatada como 'YYYY-MM-DD'
        $date = now()->format('Y-m-d');

        // Define o nome do arquivo com a data atual
        $filename = storage_path("logs/webhook_{$date}.txt");

        // Obtém o conteúdo do Request
        $content = json_encode($request->all(), JSON_PRETTY_PRINT);

        // Adiciona uma nova linha e a data ao conteúdo
        $contentToWrite = "\n\n[" . now()->format('Y-m-d H:i:s') . "]\n" . $content;

        // Salva o conteúdo no arquivo, adicionando se já existir
        file_put_contents($filename, $contentToWrite, FILE_APPEND);

        return response()->json(['status' => 'success', 'message' => 'Data saved successfully']);
    }
}
