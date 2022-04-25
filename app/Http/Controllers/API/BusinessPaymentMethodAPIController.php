<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBusinessPaymentMethodAPIRequest;
use App\Http\Requests\API\UpdateBusinessPaymentMethodAPIRequest;
use App\Models\BusinessPaymentMethod;
use App\Repositories\BusinessPaymentMethodRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BusinessPaymentMethodController
 * @package App\Http\Controllers\API
 */

class BusinessPaymentMethodAPIController extends AppBaseController
{
    /** @var  BusinessPaymentMethodRepository */
    private $businessPaymentMethodRepository;

    public function __construct(BusinessPaymentMethodRepository $businessPaymentMethodRepo)
    {
        $this->businessPaymentMethodRepository = $businessPaymentMethodRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/businessPaymentMethods",
     *      summary="Get a listing of the BusinessPaymentMethods.",
     *      tags={"BusinessPaymentMethod"},
     *      description="Get all BusinessPaymentMethods",
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
     *                  @SWG\Items(ref="#/definitions/BusinessPaymentMethod")
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
        $businessPaymentMethods = $this->businessPaymentMethodRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($businessPaymentMethods->toArray(), 'Business Payment Methods retrieved successfully');
    }

    /**
     * @param CreateBusinessPaymentMethodAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/businessPaymentMethods",
     *      summary="Store a newly created BusinessPaymentMethod in storage",
     *      tags={"BusinessPaymentMethod"},
     *      description="Store BusinessPaymentMethod",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="BusinessPaymentMethod that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/BusinessPaymentMethod")
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
     *                  ref="#/definitions/BusinessPaymentMethod"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateBusinessPaymentMethodAPIRequest $request)
    {
        $input = $request->all();

        $businessPaymentMethod = $this->businessPaymentMethodRepository->create($input);

        return $this->sendResponse($businessPaymentMethod->toArray(), 'Business Payment Method saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/businessPaymentMethods/{id}",
     *      summary="Display the specified BusinessPaymentMethod",
     *      tags={"BusinessPaymentMethod"},
     *      description="Get BusinessPaymentMethod",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of BusinessPaymentMethod",
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
     *                  ref="#/definitions/BusinessPaymentMethod"
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
        /** @var BusinessPaymentMethod $businessPaymentMethod */
        $businessPaymentMethod = $this->businessPaymentMethodRepository->find($id);

        if (empty($businessPaymentMethod)) {
            return $this->sendError('Business Payment Method not found');
        }

        return $this->sendResponse($businessPaymentMethod->toArray(), 'Business Payment Method retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateBusinessPaymentMethodAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/businessPaymentMethods/{id}",
     *      summary="Update the specified BusinessPaymentMethod in storage",
     *      tags={"BusinessPaymentMethod"},
     *      description="Update BusinessPaymentMethod",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of BusinessPaymentMethod",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="BusinessPaymentMethod that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/BusinessPaymentMethod")
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
     *                  ref="#/definitions/BusinessPaymentMethod"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateBusinessPaymentMethodAPIRequest $request)
    {
        $input = $request->all();

        /** @var BusinessPaymentMethod $businessPaymentMethod */
        $businessPaymentMethod = $this->businessPaymentMethodRepository->find($id);

        if (empty($businessPaymentMethod)) {
            return $this->sendError('Business Payment Method not found');
        }

        $businessPaymentMethod = $this->businessPaymentMethodRepository->update($input, $id);

        return $this->sendResponse($businessPaymentMethod->toArray(), 'BusinessPaymentMethod updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/businessPaymentMethods/{id}",
     *      summary="Remove the specified BusinessPaymentMethod from storage",
     *      tags={"BusinessPaymentMethod"},
     *      description="Delete BusinessPaymentMethod",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of BusinessPaymentMethod",
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
        /** @var BusinessPaymentMethod $businessPaymentMethod */
        $businessPaymentMethod = $this->businessPaymentMethodRepository->find($id);

        if (empty($businessPaymentMethod)) {
            return $this->sendError('Business Payment Method not found');
        }

        $businessPaymentMethod->delete();

        return $this->sendSuccess('Business Payment Method deleted successfully');
    }
}
