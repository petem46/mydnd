<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) {

        $http = new \GuzzleHttp\Client;

        try {
            $response = $http->post('http://mydnd.test/oauth/token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => 2,
                    'client_secret' => 'AImEniI0Wu0JIOEy4WEVoq63BhTrZFq2IIFuX8ym',
                    'username' => '$request->username',
                    'password' => '$request->password',
                ]
            ]);
            return $response->getBody();
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            return response()->json('YOU FOOL', $e->getCode());
        }
        return response()->json('YOU A FOOL', $e->getCode());
    }
}
