<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public  function Index()
    {
        return view("welcome");

    }
    public  function IndexPOST(Request $request)
    {
       $boy=$request->boy;
       $kilo=$request->kilo;
       $client = new \GuzzleHttp\Client();
       $url='http://localhost:8086/restful/webservis/webservis/GetResult/'.$boy.'/'.$kilo;
       $response = $client->request('POST', $url);
       if($response->getStatusCode()==200)
       {
           $data=json_decode($response->getBody(),true);
       //$array=array("Index"=>$response->getBody()->kitleIndex,"durum"=>$response->getBody()->durum);
        return $data;
       
       }
       return null;

    }

}
