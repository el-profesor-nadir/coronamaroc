<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index() {

        $url = 'https://covidma.herokuapp.com/api';
        $response = Http::get($url);
        $body = $response->json();
        $last_update = date_create_from_format('D M d Y H:i:s e+', $body[0]['last_updated']);
        return view('index',compact('body', 'last_update'));

    }
}
