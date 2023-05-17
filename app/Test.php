<?php


namespace App;

use GuzzleHttp\Client;
class Test extends Authenticatable
{
    public $client;
    public function __construct()
	{
		parent::__construct();
		$this->client = new Client();
	}   

    public function actionIndex()
        {
            $response = $this->client->request('GET', 'https://api64.ipify.org/?format=json');
            echo $response->getBody();
        }
}

