<?php
error_reporting(E_ALL);

// $url = 'http://127.0.0.1:8000/';
$url = 'http://asrulmaliy369.pythonanywhere.com/';

class ClientLogin
{

    private $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function filter($data)
    {
        return preg_replace('/[^a-zA-Z0-9]/', '', $data);
    }

    // public function signup($username, $password, $email)
    public function signup($data)
    {
        $url = $this->url . 'signup';
        $data = json_encode([
            'username' => $data['username'],
            'password' => $data['password'],
            'email'    => $data['email']
        ]);

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        curl_setopt($c, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json', // Optional, but recommended
        ]);

        $response = curl_exec($c);
        curl_close($c);

        return $response;
    }


    public function login($data)
    {
        $url = $this->url . 'login';
        $data = json_encode(['username' => $data['username'], 'password' => $data['password']]);

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        curl_setopt($c, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

        $response = curl_exec($c);
        curl_close($c);

        return $response;
    }

    public function logout($data)
    {
        $data = ['token' => $data['token']];
        $url = $this->url . 'logout/';
        $headers = ['Content-Type: application/json', 'Authorization: Token ' . $data['token']];

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, null);
        curl_setopt($c, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($c);
        curl_close($c);

        return $response;
    }

    public function testToken($data)
    {
        $data = ['token' => $data['token']];
        $url = $this->url . 'test_token';
        $headers = ['Content-Type: application/json', 'Authorization: Token ' . $data['token']];

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($c);
        curl_close($c);

        return $response;
    }
}

$client = new ClientLogin($url);
// $client->signup('ada2', 'Pass1234!', 'adam@mail.com');

// $data = ['username' => 'admin', 'password' => 'admin'];

// print_r($client->login($data));
// print_r($client->login('ada2', 'Pass1234!'));
// $client->login('admin', 'admin');

// $client->logout('3b767df90a2713060c1d139d4f065d5b21b0a54c');
// print_r($client->logout('320ce59f375635142de55ccd2c94d2872f3dd1a4'));

// $client->testToken('320ce59f375635142de55ccd2c94d2872f3dd1a4');
// print_r($client->testToken('320ce59f375635142de55ccd2c94d2872f3dd1a4'));
