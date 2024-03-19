<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class ChatGPTController extends Controller
{
    //
    public function index()
    {
        return view('chatgpt.index');
    }

    public function ask(Request $request)
    {
        $prompt = $request->input('prompt');
        $response = $this->askToChatGPT($prompt);
        return response()->json(array('response'=>$response), 200);
        // return view('chatgpt.response', ['response' => $response]);
    }

    private function askToChatGPT($prompt) 
    {
  
        try{
            $response = Http::withoutVerifying()
            ->withHeaders([
                'Authorization' => 'Bearer ' . "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",
                'Content-Type' => 'application/json',
            ])->post('https://api.openai.com/v1/engines/text-davinci-003/completions', [
                "prompt" => $prompt,
                "max_tokens" => 100,
                "temperature" => 0.5
            ])->json();
          
           return (!$response) ?  "No response available!" : $response['choices'][0]['text'];
        } catch (\Throwable $th) {
            return  $response;
        }
        // return $response->json()['choices'][0]['text'];
    }

}
