<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Feed;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\GeneralFileController;

class FeedAPIController extends Controller
{
    public function all(Request $request)
    {
        try {
            $limit = $request->input('limit', 15);

            $id = $request->input('id');
            $id_user =  $request->input('id_user');
            if ($id) {
                $value = Feed::find($id);
                if ($value) {
                    return ResponseFormatter::success($value, "Get Feed Success");
                } else {
                    return ResponseFormatter::error([
                        'message' => "Data Feed tidak ditemukan"
                    ], "Get Feed failed");
                }
            }
            $value = Feed::query();
            
            if($id_user){
                $value->where('id_user', $id_user);
            }

            return ResponseFormatter::success($value->orderBy('created_at', 'desc')->paginate($limit), "Get Feed Success");
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'error' => $e->getMessage(),
            ], "Get Feed Failed");
        }
    }

    public function update(Request $request)
    {
        try {
            Validator::make($request->all(), [
                'description'=> 'required',
            ],);
            $data = $request->all();
            $user = $request->user();
            $data['id_user'] = $user->id;

            $result = Feed::updateOrCreate(
                [
                    'id' => $request->id,
                ],
                $data
            );
            GeneralFileController::uploadOrDeleteFileFeed($request, $result);
            $result = Feed::find($result->id);
            return ResponseFormatter::success(
                $result,
                'Feed AddFeed Success',
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Feed Add gagal",
                'error' => $error->getMessage(),
            ],  'Feed Add Failed', 500);
        }
    }


    public function delete(Request $request)
    {

        try {
            Validator::make($request->all(), [
                'id' => 'required',
            ],);

            $result = Feed::where('id', $request->id)->delete();

            return ResponseFormatter::success(
                $result,
                'Feed Delete Success',
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Delete Feed Failed",
                'error' => $error,
            ],  'Delete Feed Failed', 500);
        }
    }
}
