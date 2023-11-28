<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIAuthController extends Controller
{
    public function dangNhap()
    {
        $credentials = request(['email','password']);

        if(!$token=auth('api')->attempt($credentials)){
            return response()->json(['error'=>'Unauthorized'] ,401  );
        }
        return response()->json([
            'access_token'=>$token,
            'token_type'=>'bearer',
            'expries_in'=>auth()->factory()->getTTL()*60
        ]);
    }
}
