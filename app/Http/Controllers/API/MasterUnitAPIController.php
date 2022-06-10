<?php

namespace App\Http\Controllers\API;

use Response;
use Exception;
use App\Models\MasterUnit;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Repositories\MasterUnitRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateMasterUnitAPIRequest;
use App\Http\Requests\API\UpdateMasterUnitAPIRequest;

/**
 * Class MasterUnitController
 * @package App\Http\Controllers\API
 */

class MasterUnitAPIController extends AppBaseController
{

    public function all(Request $request)
    {
        try {
           
            $master_unit = MasterUnit::get();
            return ResponseFormatter::success(
                $master_unit,
                'Get Master Units Product successfully',
            );
        } catch (Exception $error) {
            return ResponseFormatter::error(
                [
                    "message"=> $error
                ],
                'Get Master Units Product failed',
            );
        }
    }
}
