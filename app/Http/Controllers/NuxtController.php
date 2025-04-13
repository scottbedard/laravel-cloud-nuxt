<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class NuxtController
{
    public function __invoke(Request $request): Response
    {
        $path = $request->path();

        $url = $path === '/' ? 'http://127.0.0.1:3000' : 'http://127.0.0.1:3000/'.$path;
    
        $data = Http::get($url);

        return response($data);
    }
}