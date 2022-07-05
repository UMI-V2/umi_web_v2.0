<?php

namespace App\Http\Controllers\API;

use Midtrans\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Midtrans\Notification;

class MidtransAPIController extends Controller
{
    public function callback(Request $request)
    {
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$clientKey = config('services.midtrans.clientKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        $notification =new  Notification();

        $status= $notification->transaction_status;
        $type =  $notification->payment_type;
        $froud  =  $notification->fraud_status;
        $order_id =  $notification->order_id;

        // $transaction = 


    }
}
