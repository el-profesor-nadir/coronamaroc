<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Charts\ConfirmedCasesChart;
use App\Charts\RecoveredCasesChart;
use App\Charts\DeathCasesChart;
use App\Charts\CompareCasesChart;

class HomeController extends Controller
{
    public function index() {

        // old api not updated

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

        //charts

        $collection = collect($stats['features']);

        //confirmed cases chart

        $confirmedCasesKeys =  $collection->pluck('attributes')
                                        ->pluck('Date')
                                        ->map(function ($item) {
                                            return date('m/d/Y', $item / 1000);
                                        });

        $confirmedCasesValues =  $collection->pluck('attributes')
                                        ->pluck('Cas_confirmés');
                                    
        $confirmedCasesChart = new ConfirmedCasesChart;
        $confirmedCasesChart->labels($confirmedCasesKeys);
        $confirmedCasesChart->dataset('cas confirmés / حالات مؤكدة', 'line', $confirmedCasesValues)
                            ->color('#ff9800');

        //recovered cases chart

        $recoveredCasesKeys =   $collection->pluck('attributes')
                                            ->pluck('Date')
                                            ->map(function ($item) {
                                                return date('m/d/Y', $item / 1000);
                                            });

        $recoveredCasesValues   =   $collection->pluck('attributes')
                                                ->pluck('Retablis');
                    
        $recoveredCasesChart = new RecoveredCasesChart;
        $recoveredCasesChart->labels($recoveredCasesKeys);
        $recoveredCasesChart->dataset('guéris / المتعافون', 'line', $recoveredCasesValues)
                            ->color('#4caf50 ');

        //death cases chart

        $deathCasesKeys =   $collection->pluck('attributes')
                                            ->pluck('Date')
                                            ->map(function ($item) {
                                                return date('m/d/Y', $item / 1000);
                                            });

        $deathCasesValues   =   $collection->pluck('attributes')
                                                ->pluck('Décédés');
                    
        $deathCasesChart = new DeathCasesChart;
        $deathCasesChart->labels($deathCasesKeys);
        $deathCasesChart->dataset('décès / الوفيات', 'line', $deathCasesValues)
                        ->color('#f44336');

        //compare cases chart

        $compareCasesKeys =   $collection->pluck('attributes')
                                            ->pluck('Date')
                                            ->map(function ($item) {
                                                return date('m/d/Y', $item / 1000);
                                            });

        $compareCasesChart = new CompareCasesChart;
        $compareCasesChart->labels($compareCasesKeys);
        $compareCasesChart->dataset('cas confirmés / حالات مؤكدة', 'line', $confirmedCasesValues)
                        ->color('#ff9800')
                        ->backgroundColor('rgba(255, 255, 255, 0.1)');
        $compareCasesChart->dataset('guéris / المتعافون', 'line', $recoveredCasesValues)
                        ->color('#4caf50 ')
                        ->backgroundColor('rgba(255, 255, 255, 0.1)');
        $compareCasesChart->dataset('décès / الوفيات', 'line', $deathCasesValues)
                        ->color('#f44336')
                        ->backgroundColor('rgba(255, 255, 255, 0.1)');

        return view('index',compact('stats','regions','confirmedCasesChart','recoveredCasesChart','deathCasesChart','compareCasesChart'));
    }
}
