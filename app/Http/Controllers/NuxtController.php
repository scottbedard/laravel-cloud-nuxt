<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class NuxtController
{
    public function __invoke(Request $request): Response
    {
        $data = Http::get('http://127.0.0.1:3000');

        return response($data);
    }
}