<?php

namespace App\Http\Controllers\API;

use Response;
use Carbon\Carbon;
use App\Models\Discount;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\DB;
use App\Repositories\DiscountRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateDiscountAPIRequest;
use App\Http\Requests\API\UpdateDiscountAPIRequest;

/**
 * Class DiscountController
 * @package App\Http\Controllers\API
 */

class DiscountAPIController extends AppBaseController
{
    /** @var  DiscountRepository */
    private $discountRepository;

    public function __construct(DiscountRepository $discountRepo)
    {
        $this->discountRepository = $discountRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/discounts",
     *      summary="Get a listing of the Discounts.",
     *      tags={"Discount"},
     *      description="Get all Discounts",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Discount")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        try {
            $id = $request->input('id');
            $id_usaha = $request->input('id_usaha');
            $is_coming = $request->input('is_coming');
            $is_ongoing = $request->input('is_ongoing');
            $is_expired = $request->input('is_expired');
    
    
            if ($id) {
                $discount = Discount::with(['product_discounts.products.product_files'])->find($id);
                if ($discount) {
                    return ResponseFormatter::success($discount, 'Data diskon berhasil diambil');
                }
                return ResponseFormatter::error(null, 'Data tidak ditemukan', 404);
            }
            $discount = Discount::query();
    
            if ($id_usaha) {
                $discount->where('id_usaha',  $id_usaha);
            }

             if($is_coming){
                $discount->where('waktu_mulai', '>',  Carbon::now());
             } 
             if($is_ongoing){
                 $discount->where('waktu_mulai', '<', Carbon::now())->where('waktu_berakhir', '>', Carbon::now());
             }
             if($is_expired){
                $discount->where('waktu_berakhir', '<', Carbon::now());
             }

            
    
            return ResponseFormatter::success($discount->with(['product_discounts.products.product_files'])->orderBy('created_at', 'desc')->get(), 'Data diskon berhasil diambil');
    
        } catch (\Exception $e) {
            return ResponseFormatter::error([
                'error'=> $e
            ], "Get Discount Failed");
        }
    }

    /**
     * @param CreateDiscountAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/discounts",
     *      summary="Store a newly created Discount in storage",
     *      tags={"Discount"},
     *      description="Store Discount",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Discount that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Discount")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Discount"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            
            $result = Discount::updateOrCreate(['id' => $request->id], $data);

            ProductDiscountAPIController::createDelete($request, $result->id );
            $result = Discount::with(['product_discounts.products.product_files'])->find($result->id );
            DB::commit();
            return ResponseFormatter::success($result, 'Update Discount Success');
        }  catch (\Exception $e) {
            DB::rollBack();
            return ResponseFormatter::error([
                'error'=> $e
            ], "Add/Update Discount Failed");
        }
        
    }

    public function delete(Request $request)
    {
        try {
            $this->validate($request, [
                'id' => 'required',
            ]);

            $value = Discount::where('id',$request->id)->delete();

            return ResponseFormatter::success($value, 'Delete Discount Success');
        } catch (\Exception $e) {
            return ResponseFormatter::error([
                'error'=> $e,
            ],  'Delete Product Failed', 500);
        }}
}
