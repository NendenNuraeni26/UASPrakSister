<?php
error_reporting(1);

// $url = 'http://127.0.0.1:8000/api/';
$url = 'https://badawi.pythonanywhere.com/api/';
class ClientNews
{
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
        unset($url);
    }

    public function filter($data)
    {
        $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
        return $data;
        unset($data);
    }

    public function tampil_semua_data()
    {
        $client = curl_init($this->url . "berita/");
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;

        unset($data, $client, $response);
    }
}

$clientnews = new ClientNews($url);

$news = $clientnews->tampil_semua_data();
// print_r($news);
