<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MapController extends Controller
{
    public function index()
    {
        return view('ola-map');
    }

    public function searchLocation(Request $request)
    {
        $query = $request->query('query');

        $response = Http::withHeaders([
            'X-API-Key' => env('OLA_MAPS_API_KEY')
        ])->get(
            'https://api.olamaps.io/places/v1/autocomplete',
            [
                'input' => $query
            ]
        );

        return response()->json($response->json());
    }
}