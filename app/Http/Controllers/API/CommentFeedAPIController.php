<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Feed;
use App\Models\User;
use App\Models\CommentFeed;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Helpers\NotificationManager;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CommentFeedAPIController extends Controller
{
    public function all(Request $request)
    {
        try {
            $limit = $request->input('limit', 15);

            $id = $request->input('id');
            $id_feed = $request->input('id_feed');
            if ($id) {
                $value = CommentFeed::find($id);
                if ($value) {
                    return ResponseFormatter::success($value, "Get Comment Feed Success");
                } else {
                    return ResponseFormatter::error([
                        'message' => "Data Comment Feed tidak ditemukan"
                    ], "Get Comment Feed failed");
                }
            }
            $value = CommentFeed::query();
            if ($id_feed) {
                $value->where('id_feed', $id_feed);
            }

            return ResponseFormatter::success($value->orderBy('created_at', 'asc')->paginate($limit), "Get Comment Feed Success");
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'error' => $e->getMessage(),
            ], "Get Comment Feed Failed");
        }
    }

    public function update(Request $request)
    {
        try {
            Validator::make($request->all(), [
                'id_feed' => 'required',
                'comment' => 'required',
            ],);
            $data = $request->all();
            $user = $request->user();
            $data['id_user'] = $user->id;

            $result = CommentFeed::updateOrCreate(
                [
                    'id' => $request->id,
                ],
                $data
            );
            $result = CommentFeed::find($result->id);
            $feed = Feed::find($result->id_feed);
            if ($result->id_user != $feed->id_user) {
                $userUpload = User::find($feed->id_user);
                NotificationAPIController::add(
                    $userUpload->name,
                    "Mengomentari postingan anda",
                    "specific",
                    'comment-feed',
                    $result->id_feed,
                    $result->id,
                    $feed->id_user
                );
            }

            return ResponseFormatter::success(
                $result,
                'Add/Update Commen Feed Success',
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Add/Update Comment Feed gagal",
                'error' => $error->getMessage(),
            ],  'Add/Update Comment Feed Failed', 500);
        }
    }


    public function delete(Request $request)
    {

        try {
            Validator::make($request->all(), [
                'id' => 'required',
            ],);

            $result = CommentFeed::where('id', $request->id)->delete();

            return ResponseFormatter::success(
                $result,
                'Comment Feed Delete Success',
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Delete Comment Feed Failed",
                'error' => $error,
            ],  'Delete Comment Feed Failed', 500);
        }
    }
}
