<?php

namespace App\Console\Commands;

use App\Models\UsersModel;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Request;
use Illuminate\Support\Str;

class MyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:1111';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {


       $c = UsersModel::all()->count();
       dd($c);


       
        dd();
        $client = new Client();
        $list = config('crypto_list.list');

        $data = [];
        foreach ($list as $value) {
            $res = $client->request('GET', env('API_URL') . $value . '/USD', [
                'headers' => [
                    'X-CoinAPI-Key' => env('API_KEY')
                ]
            ]);
            $response = json_decode($res->getBody()->getContents(), true);
            $currencyData = [
                'amount' => $response['rate'],
                'currency' => $value
            ];

            $data[] = $currencyData;
        }
        dump($data);
    }
}
