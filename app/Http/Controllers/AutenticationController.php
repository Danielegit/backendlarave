<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AutenticationController extends Controller
{

    public function index(Request $request)
    {


        $creds = $request->only(['username', 'password']);
        //$token = auth()->attempt($creds);
        $token = Auth::attempt($creds);
        if (!$token) {
            return [
                'error' => 'Wrong passord or username'
            ];
        }
        return response()->json([
            'token' => $token
        ]);
    }

    public function data(Request $request)
    {
        if (auth()->user()) {
            return [
                'auth' => 'auth',
                'body'=>[
                    'title'=>'post 1',
                    'text' => 'Lorem Ipsum...'
                ]
            ];
        } else {
            return [
                'error' => 'no auth'
            ];
        }
    }
}
