<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class login extends Controller
{
    public function lact(LoginRequest $request){
        $post=$request->post();
        dump($post);
    }
}
