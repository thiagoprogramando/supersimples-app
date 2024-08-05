<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClickMassaController extends Controller {
    
    public function webhook(Request $request) {

        $date = now()->format('Y-m-d_H-i-s');
        $filename = storage_path("logs/webhook_{$date}.txt");
        $content = json_encode($request->all(), JSON_PRETTY_PRINT);
        file_put_contents($filename, $content);

        return response()->json(['status' => 'success', 'message' => 'Data saved successfully']);
    }
}
