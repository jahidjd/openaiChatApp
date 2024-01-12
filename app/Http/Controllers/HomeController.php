<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function generateResponse(Request $request)
    {
        $apiKey = env('OPENAI_API_KEY');

        $endpoint = 'https://api.openai.com/v1/chat/completions';

        $payload = [
            'model' => 'gpt-3.5-turbo',
            'messages' => $request->prompt
        ];
    
        $client = new Client();

        try {
            $response = $client->post($endpoint, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $apiKey,
                ],
                'json' => $payload,
            ]);

            return response()->json(json_decode($response->getBody()->getContents()));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
}
