<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index() {
        // api not updated
        /*$url = 'https://covidma.herokuapp.com/api';
        $response = Http::get($url);
        $body = $response->json();
        $last_update = date_create_from_format('D M d Y H:i:s e+', $body[0]['last_updated']);
        return view('index',compact('body', 'last_update'));*/
        
        // new api 
        
        $url_stats = 'https://services3.arcgis.com/hjUMsSJ87zgoicvl/arcgis/rest/services/Covid_19/FeatureServer/5/query?where=1%3D1&outFields=*&outSR=4326&f=json';
        $response_stats = Http::get($url_stats);
        $stats = $response_stats->json();

        $url_regions = 'https://services3.arcgis.com/hjUMsSJ87zgoicvl/arcgis/rest/services/Covid_19/FeatureServer/0/query?where=1%3D1&outFields=*&outSR=4326&f=json';
        $response_regions = Http::get($url_regions);
        $regions = $response_regions->json();
        //$last_update = date_create_from_format('D M d Y H:i:s e+', $stats['features'][count($stats['features'])-1]['attributes']['Date']);
        //dd($regions['features'][0]['attributes']['CR']);
        //$body['features'][count($body['features'])-1]['attributes']['Cas_confirmés'];
        //dd($stats['features'][count($stats['features'])-1]['attributes']['Date']/1000);
        return view('index',compact('stats','regions'));
    }
}
