<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index() {

        $url = 'https://covidma.herokuapp.com/api';
        $response = Http::get($url);
        $body = $response->json();
        return view('index',compact('body'));

    }
}
