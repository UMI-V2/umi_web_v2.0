<?php

namespace App\Http\Controllers\API;

use Response;
use Exception;
use Illuminate\Http\Request;
use App\Models\EventRegister;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\AppBaseController;
use App\Repositories\EventRegisterRepository;
use App\Http\Requests\API\CreateEventRegisterAPIRequest;
use App\Http\Requests\API\UpdateEventRegisterAPIRequest;

/**
 * Class EventRegisterController
 * @package App\Http\Controllers\API
 */

class EventRegisterAPIController extends AppBaseController
{
    public function all(Request $request)
    {
        try {
            $limit = $request->input('limit', 20);

            $id = $request->input('id');
            $event_id = $request->input('event_id');
            if ($id) {
                $value = EventRegister::find($id);
                if ($value) {
                    return ResponseFormatter::success($value, "Get Event Register Success");
                } else {
                    return ResponseFormatter::error([
                        'message' => "Data Event Register tidak ditemukan"
                    ], "Get Like Feed failed");
                }
            }
            $value = EventRegister::query();
            if($event_id){
                $value->where('event_id', $event_id );
            }

            return ResponseFormatter::success($value->orderBy('created_at', 'desc')->paginate($limit), "Get Event Register Success");
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'error' => $e->getMessage(),
            ], "Get Event Register Failed");
        }
    }

    public function registerEvent(Request $request)
    {
        try {
            Validator::make($request->all(), [
                'event_id'=> 'required',
                'user_id'=> 'required',
                'name'=> 'required',
                'jenis_kelamin'=> 'required',
                'tanggal_lahir'=> 'required',
                'no_hp'=> 'required',
                'foto'=> 'required',
                'city'=> 'required',
                'subdistrict'=> 'required',
                'full_address'=> 'required',
            ],);
            $data = $request->all();            

            $result = EventRegister::updateOrCreate(
                [
                    'id' => $request->id,
                ],
                $data
            );

            $result = EventRegister::find($result->id);
            return ResponseFormatter::success(
                $result,
                'Register Event Success',
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Register Event gagal",
                'error' => $error->getMessage(),
            ],  'Register Event Failed', 500);
        }
    }
}
