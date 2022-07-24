<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Feed;
use App\Models\User;
use App\Models\LikeFeed;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Helpers\NotificationManager;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LikeFeedAPIController extends Controller
{
    public function all(Request $request)
    {
        try {
            $limit = $request->input('limit', 20);

            $id = $request->input('id');
            $id_feed = $request->input('id_feed');
            if ($id) {
                $value = LikeFeed::find($id);
                if ($value) {
                    return ResponseFormatter::success($value, "Get Like Feed Success");
                } else {
                    return ResponseFormatter::error([
                        'message' => "Data Like Feed tidak ditemukan"
                    ], "Get Like Feed failed");
                }
            }
            $value = LikeFeed::query();
            if ($id_feed) {
                $value->where('id_feed', $id_feed);
            }

            return ResponseFormatter::success($value->orderBy('created_at', 'desc')->paginate($limit), "Get Like Feed Success");
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'error' => $e->getMessage(),
            ], "Get Like Feed Failed");
        }
    }

    public function update(Request $request)
    {
        try {
            Validator::make($request->all(), [
                'id_feed' => 'required',
            ],);
            $data = $request->all();
            $user = $request->user();
            $data['id_user'] = $user->id;

            $result = LikeFeed::updateOrCreate(
                [
                    'id_user' => $user->id,
                    'id_feed' => $request->id_feed,
                ],
                $data
            );

            $result = LikeFeed::find($result->id);
            $feed = Feed::find($result->id_feed);
            if ($result->id_user != $feed->id_user) {
                $userUpload = User::find($feed->id_user);
                NotificationAPIController::add(
                    $userUpload->name,
                    "Menyukai postingan anda",
                    "specific",
                    'like-feed',
                    $result->id_feed,
                    $result->id,
                    $feed->id_user
                );
            }
            return ResponseFormatter::success(
                $result,
                'Add Like Feed Success',
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Add Like Feed gagal",
                'error' => $error->getMessage(),
            ],  'Add Like Feed Failed', 500);
        }
    }


    public function delete(Request $request)
    {

        try {
            Validator::make($request->all(), [
                'id_feed' => 'required',
            ],);

            $result = LikeFeed::where('id_user', $request->user()->id)->where('id_feed', $request->id_feed)->delete();



            return ResponseFormatter::success(
                $result,
                'Like Feed Delete Success',
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Delete Like Feed Failed",
                'error' => $error,
            ],  'Delete Like Feed Failed', 500);
        }
    }
}
