<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Requests\API\CreateOpenHourAPIRequest;
use App\Http\Requests\API\UpdateOpenHourAPIRequest;
use App\Models\OpenHour;
use App\Repositories\OpenHourRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Exception;
use Response;

/**
 * Class OpenHourController
 * @package App\Http\Controllers\API
 */

class OpenHourAPIController extends AppBaseController
{
    /** @var  OpenHourRepository */
    private $openHourRepository;

    public function __construct(OpenHourRepository $openHourRepo)
    {
        $this->openHourRepository = $openHourRepo;
    }

    public function index(Request $request)
    {
        try {
            $idUsaha = $request->input('id_usaha');
            $openHours = OpenHour::where('id_usaha', $idUsaha)->first();

            return ResponseFormatter::success($openHours, "Get Open Hours Success");
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'error' => $e,
            ], "Get Open Hours Failed");
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'id_usaha' => 'required',
            ]);
            $data = $request->all();

            OpenHour::updateOrCreate([
                'id_usaha' => $request->id_usaha,
            ], $data);

            $openHour = OpenHour::where('id_usaha', $request->id_usaha)->first();

            return ResponseFormatter::success($openHour, "Update Open Hours Success");
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'error' => $e,
            ], "Update Open Hours Failed");
        }
    }

    // public function destroy($id)
    // {
    //     /** @var OpenHour $openHour */
    //     $openHour = $this->openHourRepository->find($id);

    //     if (empty($openHour)) {
    //         return $this->sendError('Open Hour not found');
    //     }

    //     $openHour->delete();

    //     return $this->sendSuccess('Open Hour deleted successfully');
    // }
}
