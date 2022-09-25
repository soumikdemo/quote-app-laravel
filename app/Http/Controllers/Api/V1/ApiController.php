<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\V1\QuoteCollection;

class ApiController extends Controller
{
    public function fetch(){
        $data = []; 

        for($i=0; $i<5; $i++){
            $response = Http::get('https://api.kanye.rest/');
            $quoteArray = $response->json($key = null);
            $data[] = $quoteArray['quote'];
        }

        return new QuoteCollection(collect($data));
    }
}
