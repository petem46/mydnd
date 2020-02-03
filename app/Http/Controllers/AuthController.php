<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Exception;
class AuthController extends Controller
{
    public function login(Request $request) {

        $http = new Client;

        try {
            $response = $http->post('http://mydnd.fcat.internal/oauth/token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => 2,
                    'client_secret' => 'I6gU26b1Dy9CZtBXPGDmuTXOYxijFelKSslvJWCA',
                    'username' => $request->username,
                    'password' => $request->password,
                ]
            ]);
            return $response->getBody();
        }catch(ClientException $ce){
            $status = 'false';
            $message = $ce->getMessage();
            $data = [];
        }catch(RequestException $re){
           $status = 'false';
           $message = $re->getMessage();
           $data = [];
        }catch(Exception $e){
           $this->status = 'false';
           $this->message = $e->getMessage();
           $data = [];
        }

        return ['status'=>$status,'message'=>$message,'data'=>$data];
    }
}
