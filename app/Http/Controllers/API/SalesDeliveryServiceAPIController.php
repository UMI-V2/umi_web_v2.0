<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSalesDeliveryServiceAPIRequest;
use App\Http\Requests\API\UpdateSalesDeliveryServiceAPIRequest;
use App\Models\SalesDeliveryService;
use App\Repositories\SalesDeliveryServiceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SalesDeliveryServiceController
 * @package App\Http\Controllers\API
 */

class SalesDeliveryServiceAPIController extends AppBaseController
{
    /** @var  SalesDeliveryServiceRepository */
    private $salesDeliveryServiceRepository;

    public function __construct(SalesDeliveryServiceRepository $salesDeliveryServiceRepo)
    {
        $this->salesDeliveryServiceRepository = $salesDeliveryServiceRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/salesDeliveryServices",
     *      summary="Get a listing of the SalesDeliveryServices.",
     *      tags={"SalesDeliveryService"},
     *      description="Get all SalesDeliveryServices",
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
     *                  @SWG\Items(ref="#/definitions/SalesDeliveryService")
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
        $salesDeliveryServices = $this->salesDeliveryServiceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($salesDeliveryServices->toArray(), 'Sales Delivery Services retrieved successfully');
    }

    /**
     * @param CreateSalesDeliveryServiceAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/salesDeliveryServices",
     *      summary="Store a newly created SalesDeliveryService in storage",
     *      tags={"SalesDeliveryService"},
     *      description="Store SalesDeliveryService",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SalesDeliveryService that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SalesDeliveryService")
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
     *                  ref="#/definitions/SalesDeliveryService"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateSalesDeliveryServiceAPIRequest $request)
    {
        $input = $request->all();

        $salesDeliveryService = $this->salesDeliveryServiceRepository->create($input);

        return $this->sendResponse($salesDeliveryService->toArray(), 'Sales Delivery Service saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/salesDeliveryServices/{id}",
     *      summary="Display the specified SalesDeliveryService",
     *      tags={"SalesDeliveryService"},
     *      description="Get SalesDeliveryService",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SalesDeliveryService",
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
     *                  ref="#/definitions/SalesDeliveryService"
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
        /** @var SalesDeliveryService $salesDeliveryService */
        $salesDeliveryService = $this->salesDeliveryServiceRepository->find($id);

        if (empty($salesDeliveryService)) {
            return $this->sendError('Sales Delivery Service not found');
        }

        return $this->sendResponse($salesDeliveryService->toArray(), 'Sales Delivery Service retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateSalesDeliveryServiceAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/salesDeliveryServices/{id}",
     *      summary="Update the specified SalesDeliveryService in storage",
     *      tags={"SalesDeliveryService"},
     *      description="Update SalesDeliveryService",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SalesDeliveryService",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SalesDeliveryService that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SalesDeliveryService")
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
     *                  ref="#/definitions/SalesDeliveryService"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateSalesDeliveryServiceAPIRequest $request)
    {
        $input = $request->all();

        /** @var SalesDeliveryService $salesDeliveryService */
        $salesDeliveryService = $this->salesDeliveryServiceRepository->find($id);

        if (empty($salesDeliveryService)) {
            return $this->sendError('Sales Delivery Service not found');
        }

        $salesDeliveryService = $this->salesDeliveryServiceRepository->update($input, $id);

        return $this->sendResponse($salesDeliveryService->toArray(), 'SalesDeliveryService updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/salesDeliveryServices/{id}",
     *      summary="Remove the specified SalesDeliveryService from storage",
     *      tags={"SalesDeliveryService"},
     *      description="Delete SalesDeliveryService",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SalesDeliveryService",
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
        /** @var SalesDeliveryService $salesDeliveryService */
        $salesDeliveryService = $this->salesDeliveryServiceRepository->find($id);

        if (empty($salesDeliveryService)) {
            return $this->sendError('Sales Delivery Service not found');
        }

        $salesDeliveryService->delete();

        return $this->sendSuccess('Sales Delivery Service deleted successfully');
    }
}
