<?php

namespace App\Http\Controllers\API;

use Response;
use Exception;
use App\Models\Balances;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Repositories\BalancesRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateBalancesAPIRequest;
use App\Http\Requests\API\UpdateBalancesAPIRequest;

/**
 * Class BalancesController
 * @package App\Http\Controllers\API
 */

class BalancesAPIController extends AppBaseController
{
    public function getMyTransaction(Request $request)
    {
        try {
            $balance= Balances::where('id_user',$request->user()->id )->get();
            return ResponseFormatter::success(
               ["total_saldo"=> Balances::where('id_user',$request->user()->id )->sum('pemasukan'),
                "detail"=> $balance->load(['master_transaction_categories', 'sales_transactions']),],
                "Get Balance Berhasil",
            );
        } catch (Exception $e) {
            return ResponseFormatter::error(
                $e->getMessage(),
                "Get Balance Failed",
            );
        }
    }


}
