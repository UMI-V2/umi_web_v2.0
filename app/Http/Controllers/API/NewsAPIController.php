<?php

namespace App\Http\Controllers\API;

use Response;
use Exception;
use App\Models\News;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Repositories\NewsRepository;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\GeneralFileController;
use App\Http\Requests\API\CreateNewsAPIRequest;
use App\Http\Requests\API\UpdateNewsAPIRequest;

/**
 * Class NewsController
 * @package App\Http\Controllers\API
 */

class NewsAPIController extends AppBaseController
{
    public function all(Request $request)
    {
        try {
            $limit = $request->input('limit', 10);

            $id = $request->input('id');
            $title = $request->input('title');
            $is_headline = $request->input('is_headline');

            if ($id) {
                $value = News::find($id);
                if ($value) {
                    return ResponseFormatter::success($value, "Get News Success");
                } else {
                    return ResponseFormatter::error([
                        'message' => "Data News tidak ditemukan"
                    ], "Get News failed");
                }
            }
            $value = News::query();


            if ($title) {
                $value->where('title', 'like', '%' . $title . '%');
            }
            if ($is_headline!=null) {
                // dd($request->user()->id);
                $value->where('is_headline', $is_headline);
            }

            return ResponseFormatter::success($value->orderBy('created_at', 'desc')->paginate($limit), "Get News Success");
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'error' => $e->getMessage(),
            ], "Get News Failed");
        }
    }

    public function update(Request $request)
    {
        try {
            Validator::make($request->all(), [
                'id_bank' => 'required',
                'nominal_request' => 'required',
                'no_rek' => 'required',
                'rek_name' => 'required',
                'title' => 'required',
                'sub_title' => 'required',
                'description' => 'required',
            ],);
            $data = $request->all();
            $user = $request->user();
            if(!($request->author)){
                $data['author'] = $user->name;
            }
            $result = News::updateOrCreate(
                [
                    'id' => $request->id,
                ],
                $data
            );
            GeneralFileController::uploadOrDeleteFileNews($request, $result);
            $result = News::find($result->id);
            return ResponseFormatter::success(
                $result,
                'News Add Request Success',
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "News Add gagal",
                'error' => $error->getMessage(),
            ],  'News Add Failed', 500);
        }
    }


    public function delete(Request $request)
    {

        try {
            Validator::make($request->all(), [
                'id' => 'required',
            ],);

            $result = News::where('id', $request->id)->delete();

            return ResponseFormatter::success(
                $result,
                'News Delete Success',
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Delete News Failed",
                'error' => $error,
            ],  'Delete News Failed', 500);
        }
    }
}
