<?php

namespace App\Http\Controllers\API;

use Response;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\MasterDeliveryService;
use App\Http\Controllers\AppBaseController;
use App\Repositories\MasterDeliveryServiceRepository;
use App\Http\Requests\API\CreateMasterDeliveryServiceAPIRequest;
use App\Http\Requests\API\UpdateMasterDeliveryServiceAPIRequest;

/**
 * Class MasterDeliveryServiceController
 * @package App\Http\Controllers\API
 */

class MasterDeliveryServiceAPIController extends AppBaseController
{
    /** @var  MasterDeliveryServiceRepository */
    private $masterDeliveryServiceRepository;

    public function __construct(MasterDeliveryServiceRepository $masterDeliveryServiceRepo)
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
     *      tags={"MasterDeliveryService"},
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
     *                  @SWG\Items(ref="#/definitions/MasterDeliveryService")
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

        // return $this->sendResponse($masterDeliveryServices->toArray(), 'Master Delivery Services retrieved successfully');
        return ResponseFormatter::success($masterDeliveryServices, 'Master Delivery Services retrieved successfully');

    }

    /**
     * @param CreateMasterDeliveryServiceAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/masterDeliveryServices",
     *      summary="Store a newly created MasterDeliveryService in storage",
     *      tags={"MasterDeliveryService"},
     *      description="Store MasterDeliveryService",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MasterDeliveryService that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MasterDeliveryService")
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
     *                  ref="#/definitions/MasterDeliveryService"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMasterDeliveryServiceAPIRequest $request)
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
     *      summary="Display the specified MasterDeliveryService",
     *      tags={"MasterDeliveryService"},
     *      description="Get MasterDeliveryService",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterDeliveryService",
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
     *                  ref="#/definitions/MasterDeliveryService"
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
        /** @var MasterDeliveryService $masterDeliveryService */
        $masterDeliveryService = $this->masterDeliveryServiceRepository->find($id);

        if (empty($masterDeliveryService)) {
            return $this->sendError('Master Delivery Service not found');
        }

        return $this->sendResponse($masterDeliveryService->toArray(), 'Master Delivery Service retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMasterDeliveryServiceAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/masterDeliveryServices/{id}",
     *      summary="Update the specified MasterDeliveryService in storage",
     *      tags={"MasterDeliveryService"},
     *      description="Update MasterDeliveryService",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterDeliveryService",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MasterDeliveryService that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MasterDeliveryService")
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
     *                  ref="#/definitions/MasterDeliveryService"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMasterDeliveryServiceAPIRequest $request)
    {
        $input = $request->all();

        /** @var MasterDeliveryService $masterDeliveryService */
        $masterDeliveryService = $this->masterDeliveryServiceRepository->find($id);

        if (empty($masterDeliveryService)) {
            return $this->sendError('Master Delivery Service not found');
        }

        $masterDeliveryService = $this->masterDeliveryServiceRepository->update($input, $id);

        return $this->sendResponse($masterDeliveryService->toArray(), 'MasterDeliveryService updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/masterDeliveryServices/{id}",
     *      summary="Remove the specified MasterDeliveryService from storage",
     *      tags={"MasterDeliveryService"},
     *      description="Delete MasterDeliveryService",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterDeliveryService",
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
        /** @var MasterDeliveryService $masterDeliveryService */
        $masterDeliveryService = $this->masterDeliveryServiceRepository->find($id);

        if (empty($masterDeliveryService)) {
            return $this->sendError('Master Delivery Service not found');
        }

        $masterDeliveryService->delete();

        return $this->sendSuccess('Master Delivery Service deleted successfully');
    }
}
