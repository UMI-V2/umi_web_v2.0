<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createmaster_delivery_serviceAPIRequest;
use App\Http\Requests\API\Updatemaster_delivery_serviceAPIRequest;
use App\Models\master_delivery_service;
use App\Repositories\master_delivery_serviceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class master_delivery_serviceController
 * @package App\Http\Controllers\API
 */

class master_delivery_serviceAPIController extends AppBaseController
{
    /** @var  master_delivery_serviceRepository */
    private $masterDeliveryServiceRepository;

    public function __construct(master_delivery_serviceRepository $masterDeliveryServiceRepo)
    {
        $this->masterDeliveryServiceRepository = $masterDeliveryServiceRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/masterDeliveryServices",
     *      summary="Get a listing of the master_delivery_services.",
     *      tags={"master_delivery_service"},
     *      description="Get all master_delivery_services",
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
     *                  @SWG\Items(ref="#/definitions/master_delivery_service")
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
        $masterDeliveryServices = $this->masterDeliveryServiceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($masterDeliveryServices->toArray(), 'Master Delivery Services retrieved successfully');
    }

    /**
     * @param Createmaster_delivery_serviceAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/masterDeliveryServices",
     *      summary="Store a newly created master_delivery_service in storage",
     *      tags={"master_delivery_service"},
     *      description="Store master_delivery_service",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="master_delivery_service that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/master_delivery_service")
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
     *                  ref="#/definitions/master_delivery_service"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createmaster_delivery_serviceAPIRequest $request)
    {
        $input = $request->all();

        $masterDeliveryService = $this->masterDeliveryServiceRepository->create($input);

        return $this->sendResponse($masterDeliveryService->toArray(), 'Master Delivery Service saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/masterDeliveryServices/{id}",
     *      summary="Display the specified master_delivery_service",
     *      tags={"master_delivery_service"},
     *      description="Get master_delivery_service",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_delivery_service",
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
     *                  ref="#/definitions/master_delivery_service"
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
        /** @var master_delivery_service $masterDeliveryService */
        $masterDeliveryService = $this->masterDeliveryServiceRepository->find($id);

        if (empty($masterDeliveryService)) {
            return $this->sendError('Master Delivery Service not found');
        }

        return $this->sendResponse($masterDeliveryService->toArray(), 'Master Delivery Service retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updatemaster_delivery_serviceAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/masterDeliveryServices/{id}",
     *      summary="Update the specified master_delivery_service in storage",
     *      tags={"master_delivery_service"},
     *      description="Update master_delivery_service",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_delivery_service",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="master_delivery_service that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/master_delivery_service")
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
     *                  ref="#/definitions/master_delivery_service"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updatemaster_delivery_serviceAPIRequest $request)
    {
        $input = $request->all();

        /** @var master_delivery_service $masterDeliveryService */
        $masterDeliveryService = $this->masterDeliveryServiceRepository->find($id);

        if (empty($masterDeliveryService)) {
            return $this->sendError('Master Delivery Service not found');
        }

        $masterDeliveryService = $this->masterDeliveryServiceRepository->update($input, $id);

        return $this->sendResponse($masterDeliveryService->toArray(), 'master_delivery_service updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/masterDeliveryServices/{id}",
     *      summary="Remove the specified master_delivery_service from storage",
     *      tags={"master_delivery_service"},
     *      description="Delete master_delivery_service",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_delivery_service",
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
        /** @var master_delivery_service $masterDeliveryService */
        $masterDeliveryService = $this->masterDeliveryServiceRepository->find($id);

        if (empty($masterDeliveryService)) {
            return $this->sendError('Master Delivery Service not found');
        }

        $masterDeliveryService->delete();

        return $this->sendSuccess('Master Delivery Service deleted successfully');
    }
}
