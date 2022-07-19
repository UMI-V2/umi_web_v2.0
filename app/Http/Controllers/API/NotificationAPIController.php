<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\DB;
use App\Helpers\NotificationManager;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class NotificationAPIController extends Controller
{
    public function getMyNotification(Request $request)
    {
        try {

            $idUser = $request->user()->id;
            $result = Notification::where('id_user_destination',  $idUser);

            return ResponseFormatter::success($result->orderBy('created_at', 'desc')->get(), "Get My Notification Success");
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'error' => $e->getMessage(),
            ], "Get Notification Failed");
        }
    }

    public function markReadAll(Request $request)
    {
        try {

            $idUser = $request->user()->id;
            $result = Notification::where('id_user_destination',  $idUser)->where('is_read', 0)->get();

            foreach ($result as $notif ) {
                $notif->is_read =1;
                $notif->save();
            }

            return ResponseFormatter::success($result->orderBy('created_at', 'desc')->get(), "Update Mark all Notification Success");
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'error' => $e->getMessage(),
            ], "Update Mark all Notification Failed");
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required',
            ]);
            $data = $request->all();

            $result = Notification::updateOrCreate([
                'id' => $request->id,
            ], $data);

            $result = Notification::find($result->id);
            return ResponseFormatter::success($result, "Update Notification Success");
            
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'error' => $e->getMessage(),
            ], "Update Notification Failed");
        }
    }


    public static function add(String $title, String $sort_message, String $type = null, String $category = null, String $full_message = null, String $id_item = null, String $id_user_destination = null,  String $image = null)
    {
        try {
            DB::beginTransaction();
            $result =  Notification::create([
                'id_item' => $id_item,
                'id_user_destination' => $id_user_destination,
                'type' => $type,
                'category' => $category,
                'title' => $title,
                'sort_message' => $sort_message,
                'full_message' => $full_message,
                'image' => $image,
            ]);



            $result = Notification::find($result->id);
            DB::commit();
            $user = User::find($id_user_destination);
            if ($user) {
                NotificationManager::sendNotification($title, $sort_message,  $user->token_notification);
            }

            return ResponseFormatter::success($result, "Add Notification Success");
        } catch (Exception $e) {
            DB::rollBack();

            return ResponseFormatter::error([
                'error' => $e->getMessage(),
            ], "Add Notification Failed");
        }
    }

    public function delete(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required',
            ]);

            $result = Notification::where('id', $request->id)->delete();

            return ResponseFormatter::success($result, "Delete Notification Success");
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'error' => $e->getMessage(),
            ], "Delete Notification Failed");
        }
    }
}
