<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    // home
    public  function home($id = null)
    {
        if($id)
        {
            $url = 'https://jsonmock.hackerrank.com/api/medical_records?page='. $id;
        } else {
            $url = 'https://jsonmock.hackerrank.com/api/medical_records';
        }

        $client = new Client();

        $guzzleResponse = $client->get($url);

        if ($guzzleResponse->getStatusCode() == 200) {

            $records = json_decode($guzzleResponse->getBody(), true);
                // dd($records);
        } else {
            return 'data not fount';
        }

        return view('welcome' , compact('records'));
    } // end home

    // search
    public function search(Request $request , $id)
    {
        
        if($id)
        {
            $url = 'https://jsonmock.hackerrank.com/api/medical_records?page='. $id;
        } else {
            $url = 'https://jsonmock.hackerrank.com/api/medical_records';
        }

        $client = new Client();

        $guzzleResponse = $client->get($url);

        if ($guzzleResponse->getStatusCode() == 200) {

            $records = json_decode($guzzleResponse->getBody(), true);

            $min = collect($records['data'])->where('doctor.id' , $request->doctor_id)->where('diagnosis.id' , $request->diagnosis_id)->min('vitals.bodyTemperature');
            $max = collect($records['data'])->where('doctor.id' , $request->doctor_id)->where('diagnosis.id' , $request->diagnosis_id)->max('vitals.bodyTemperature');

        } else {
            return 'data not fount';
        }

        return view('search' , compact('min' , 'max'));
    } // end search

    public function orders()
    {
        
        $orders = Order::select(
            DB::raw('id'),
            DB::raw('order_date'),
            DB::raw('customer_id'),
            DB::raw('YEAR(order_date) as year'),
            DB::raw('MONTH(order_date) as month')
        )->with('order_details')->groupBy('year','month')->orderBy('order_date' , 'asc')->get();
        

        return view('sql' , compact('orders'));

    }

}
