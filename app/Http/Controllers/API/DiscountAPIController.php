<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDiscountAPIRequest;
use App\Http\Requests\API\UpdateDiscountAPIRequest;
use App\Models\Discount;
use App\Repositories\DiscountRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

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
        $discounts = $this->discountRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($discounts->toArray(), 'Discounts retrieved successfully');
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
    public function store(CreateDiscountAPIRequest $request)
    {
        $input = $request->all();

        $discount = $this->discountRepository->create($input);

        return $this->sendResponse($discount->toArray(), 'Discount saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/discounts/{id}",
     *      summary="Display the specified Discount",
     *      tags={"Discount"},
     *      description="Get Discount",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Discount",
     *          type="integer",
     *          required=true,
     *          in="path"
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
    public function show($id)
    {
        /** @var Discount $discount */
        $discount = $this->discountRepository->find($id);

        if (empty($discount)) {
            return $this->sendError('Discount not found');
        }

        return $this->sendResponse($discount->toArray(), 'Discount retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateDiscountAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/discounts/{id}",
     *      summary="Update the specified Discount in storage",
     *      tags={"Discount"},
     *      description="Update Discount",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Discount",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Discount that should be updated",
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
    public function update($id, UpdateDiscountAPIRequest $request)
    {
        $input = $request->all();

        /** @var Discount $discount */
        $discount = $this->discountRepository->find($id);

        if (empty($discount)) {
            return $this->sendError('Discount not found');
        }

        $discount = $this->discountRepository->update($input, $id);

        return $this->sendResponse($discount->toArray(), 'Discount updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/discounts/{id}",
     *      summary="Remove the specified Discount from storage",
     *      tags={"Discount"},
     *      description="Delete Discount",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Discount",
     *          type="integer",
     *          required=true,
     *          in="path"
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
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Discount $discount */
        $discount = $this->discountRepository->find($id);

        if (empty($discount)) {
            return $this->sendError('Discount not found');
        }

        $discount->delete();

        return $this->sendSuccess('Discount deleted successfully');
    }
}
