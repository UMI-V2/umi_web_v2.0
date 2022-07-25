<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\GeneralFileController;
use Illuminate\Support\Facades\Auth;

class EventAPIController extends Controller
{
    public function all(Request $request)
    {
        try {
            $limit = $request->input('limit', 10);

            $id = $request->input('id');
            $title = $request->input('title');
            $isMyEventOnly =  $request->input('isMyEventOnly');

            if ($id) {
                $value = Event::find($id);
                if ($value) {
                    return ResponseFormatter::success($value, "Get Event Success");
                } else {
                    return ResponseFormatter::error([
                        'message' => "Data Event tidak ditemukan"
                    ], "Get Event failed");
                }
            }
            $value = Event::query();


            if ($title) {
                $value->where('title', 'like', '%' . $title . '%');
            }
            if($isMyEventOnly){
                $value->whereHas('event_registers', function ($q) {
                    $q->where('user_id',  Auth::user()->id);
                });
            }

            return ResponseFormatter::success($value->orderBy('registration_deadline', 'asc')->paginate($limit), "Get News Success");
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
                'title'=> 'required',
                'sub_title'=> 'required',
                'description'=> 'required',
                'start_time'=> 'required',
                'end_time'=> 'required',
                'contact_person'=> 'required',
                'max_registers'=> 'required',
                'registration_deadline'=> 'required'
            ],);
            $data = $request->all();
            $user = $request->user();
            if(!($request->author)){
                $data['author'] = $user->name;
            }
            $result = Event::updateOrCreate(
                [
                    'id' => $request->id,
                ],
                $data
            );
            GeneralFileController::uploadOrDeleteEvent($request, $result);

            $result = Event::find($result->id);
            return ResponseFormatter::success(
                $result,
                'Event Add Success',
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Event Add Request gagal",
                'error' => $error->getMessage(),
            ],  'Event Add  Failed', 500);
        }
    }


    public function delete(Request $request)
    {

        try {
            Validator::make($request->all(), [
                'id' => 'required',
            ],);

            $result = Event::where('id', $request->id)->delete();

            return ResponseFormatter::success(
                $result,
                'Event Delete Success',
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Delete Event Failed",
                'error' => $error,
            ],  'Delete Event Failed', 500);
        }
    }

    
}
