<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
class CryptoCurrencyController extends Controller
{
    public function getCurrencyList() {
        
        $client = new Client();
        $list = config('crypto_list.list');
        $data = [];
        foreach ($list as $value) {
            $res = $client->request('GET', env('API_URL')  . $value . '/USD', [
                'headers' => [
                    'X-CoinAPI-Key' => env('API_KEY')
                ]
            ]);
            $response = json_decode($res->getBody()->getContents(), true);
            $currencyData = [
                'amount' => round($response['rate'], 2),
                'currency' => $value
            ];
            $data[] = $currencyData;
        }
 
        return view('main')->with('data',$data); 
    } 
}
