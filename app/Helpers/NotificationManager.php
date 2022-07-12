<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Facades\Request;

class NotificationManager
{
    public static function sendNotification(string $title, string $body,string $token=null)
    {
        $tokenFirebase = [];
        if($token){
            $tokenFirebase = [ $token];
        }else{
            $tokenFirebase = User::whereNotNull('token_notification')->pluck('token_notification')->all();
        }
            
        $SERVER_API_KEY = env('FCM_SERVER_KEY');
    
        $data = [
            "registration_ids" => $tokenFirebase,
            "notification" => [
                "title" => $title,
                "body" => $body,  
            ],
            'priority'=> 'high',
            'data'=>[
              'click_action'=> 'FLUTTER_NOTIFICATION_CLICK',
              'id'=> '1',
              'status'=> 'done'
            ],
        ];
        $dataString = json_encode($data);
      
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
      
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
                 
        $response = curl_exec($ch);

        // dd($response);
        return ResponseFormatter::success( $response, "Send Notification Success");
        
        // return back()->with('success', 'Notification send successfully.');
    }

}