<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBusinessDeliveryServiceAPIRequest;
use App\Http\Requests\API\UpdateBusinessDeliveryServiceAPIRequest;
use App\Models\BusinessDeliveryService;
use App\Repositories\BusinessDeliveryServiceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BusinessDeliveryServiceController
 * @package App\Http\Controllers\API
 */

class BusinessDeliveryServiceAPIController extends AppBaseController
{
    /** @var  BusinessDeliveryServiceRepository */
    private $businessDeliveryServiceRepository;

    public function __construct(BusinessDeliveryServiceRepository $businessDeliveryServiceRepo)
    {
        $this->businessDeliveryServiceRepository = $businessDeliveryServiceRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/businessDeliveryServices",
     *      summary="Get a listing of the BusinessDeliveryServices.",
     *      tags={"BusinessDeliveryService"},
     *      description="Get all BusinessDeliveryServices",
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
     *                  @SWG\Items(ref="#/definitions/BusinessDeliveryService")
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
        $businessDeliveryServices = $this->businessDeliveryServiceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($businessDeliveryServices->toArray(), 'Business Delivery Services retrieved successfully');
    }

    /**
     * @param CreateBusinessDeliveryServiceAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/businessDeliveryServices",
     *      summary="Store a newly created BusinessDeliveryService in storage",
     *      tags={"BusinessDeliveryService"},
     *      description="Store BusinessDeliveryService",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="BusinessDeliveryService that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/BusinessDeliveryService")
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
     *                  ref="#/definitions/BusinessDeliveryService"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateBusinessDeliveryServiceAPIRequest $request)
    {
        $input = $request->all();

        $businessDeliveryService = $this->businessDeliveryServiceRepository->create($input);

        return $this->sendResponse($businessDeliveryService->toArray(), 'Business Delivery Service saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/businessDeliveryServices/{id}",
     *      summary="Display the specified BusinessDeliveryService",
     *      tags={"BusinessDeliveryService"},
     *      description="Get BusinessDeliveryService",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of BusinessDeliveryService",
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
     *                  ref="#/definitions/BusinessDeliveryService"
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
        /** @var BusinessDeliveryService $businessDeliveryService */
        $businessDeliveryService = $this->businessDeliveryServiceRepository->find($id);

        if (empty($businessDeliveryService)) {
            return $this->sendError('Business Delivery Service not found');
        }

        return $this->sendResponse($businessDeliveryService->toArray(), 'Business Delivery Service retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateBusinessDeliveryServiceAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/businessDeliveryServices/{id}",
     *      summary="Update the specified BusinessDeliveryService in storage",
     *      tags={"BusinessDeliveryService"},
     *      description="Update BusinessDeliveryService",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of BusinessDeliveryService",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="BusinessDeliveryService that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/BusinessDeliveryService")
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
     *                  ref="#/definitions/BusinessDeliveryService"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateBusinessDeliveryServiceAPIRequest $request)
    {
        $input = $request->all();

        /** @var BusinessDeliveryService $businessDeliveryService */
        $businessDeliveryService = $this->businessDeliveryServiceRepository->find($id);

        if (empty($businessDeliveryService)) {
            return $this->sendError('Business Delivery Service not found');
        }

        $businessDeliveryService = $this->businessDeliveryServiceRepository->update($input, $id);

        return $this->sendResponse($businessDeliveryService->toArray(), 'BusinessDeliveryService updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/businessDeliveryServices/{id}",
     *      summary="Remove the specified BusinessDeliveryService from storage",
     *      tags={"BusinessDeliveryService"},
     *      description="Delete BusinessDeliveryService",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of BusinessDeliveryService",
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
        /** @var BusinessDeliveryService $businessDeliveryService */
        $businessDeliveryService = $this->businessDeliveryServiceRepository->find($id);

        if (empty($businessDeliveryService)) {
            return $this->sendError('Business Delivery Service not found');
        }

        $businessDeliveryService->delete();

        return $this->sendSuccess('Business Delivery Service deleted successfully');
    }
}
