<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMasterStatusBusinessAPIRequest;
use App\Http\Requests\API\UpdateMasterStatusBusinessAPIRequest;
use App\Models\MasterStatusBusiness;
use App\Repositories\MasterStatusBusinessRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MasterStatusBusinessController
 * @package App\Http\Controllers\API
 */

class MasterStatusBusinessAPIController extends AppBaseController
{
    /** @var  MasterStatusBusinessRepository */
    private $masterStatusBusinessRepository;

    public function __construct(MasterStatusBusinessRepository $masterStatusBusinessRepo)
    {
        $this->masterStatusBusinessRepository = $masterStatusBusinessRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/masterStatusBusinesses",
     *      summary="Get a listing of the master_status_businesses.",
     *      tags={"MasterStatusBusiness"},
     *      description="Get all master_status_businesses",
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
     *                  @SWG\Items(ref="#/definitions/MasterStatusBusiness")
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
        $masterStatusBusinesses = $this->masterStatusBusinessRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($masterStatusBusinesses->toArray(), 'Master Status Businesses retrieved successfully');
    }

    /**
     * @param CreateMasterStatusBusinessAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/masterStatusBusinesses",
     *      summary="Store a newly created MasterStatusBusiness in storage",
     *      tags={"MasterStatusBusiness"},
     *      description="Store MasterStatusBusiness",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MasterStatusBusiness that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MasterStatusBusiness")
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
     *                  ref="#/definitions/MasterStatusBusiness"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMasterStatusBusinessAPIRequest $request)
    {
        $input = $request->all();

        $masterStatusBusiness = $this->masterStatusBusinessRepository->create($input);

        return $this->sendResponse($masterStatusBusiness->toArray(), 'Master Status Business saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/masterStatusBusinesses/{id}",
     *      summary="Display the specified MasterStatusBusiness",
     *      tags={"MasterStatusBusiness"},
     *      description="Get MasterStatusBusiness",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterStatusBusiness",
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
     *                  ref="#/definitions/MasterStatusBusiness"
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
        /** @var MasterStatusBusiness $masterStatusBusiness */
        $masterStatusBusiness = $this->masterStatusBusinessRepository->find($id);

        if (empty($masterStatusBusiness)) {
            return $this->sendError('Master Status Business not found');
        }

        return $this->sendResponse($masterStatusBusiness->toArray(), 'Master Status Business retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMasterStatusBusinessAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/masterStatusBusinesses/{id}",
     *      summary="Update the specified MasterStatusBusiness in storage",
     *      tags={"MasterStatusBusiness"},
     *      description="Update MasterStatusBusiness",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterStatusBusiness",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MasterStatusBusiness that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MasterStatusBusiness")
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
     *                  ref="#/definitions/MasterStatusBusiness"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMasterStatusBusinessAPIRequest $request)
    {
        $input = $request->all();

        /** @var MasterStatusBusiness $masterStatusBusiness */
        $masterStatusBusiness = $this->masterStatusBusinessRepository->find($id);

        if (empty($masterStatusBusiness)) {
            return $this->sendError('Master Status Business not found');
        }

        $masterStatusBusiness = $this->masterStatusBusinessRepository->update($input, $id);

        return $this->sendResponse($masterStatusBusiness->toArray(), 'MasterStatusBusiness updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/masterStatusBusinesses/{id}",
     *      summary="Remove the specified MasterStatusBusiness from storage",
     *      tags={"MasterStatusBusiness"},
     *      description="Delete MasterStatusBusiness",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterStatusBusiness",
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
        /** @var MasterStatusBusiness $masterStatusBusiness */
        $masterStatusBusiness = $this->masterStatusBusinessRepository->find($id);

        if (empty($masterStatusBusiness)) {
            return $this->sendError('Master Status Business not found');
        }

        $masterStatusBusiness->delete();

        return $this->sendSuccess('Master Status Business deleted successfully');
    }
}
