<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createmaster_status_businessAPIRequest;
use App\Http\Requests\API\Updatemaster_status_businessAPIRequest;
use App\Models\master_status_business;
use App\Repositories\master_status_businessRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class master_status_businessController
 * @package App\Http\Controllers\API
 */

class master_status_businessAPIController extends AppBaseController
{
    /** @var  master_status_businessRepository */
    private $masterStatusBusinessRepository;

    public function __construct(master_status_businessRepository $masterStatusBusinessRepo)
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
     *      tags={"master_status_business"},
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
     *                  @SWG\Items(ref="#/definitions/master_status_business")
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
     * @param Createmaster_status_businessAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/masterStatusBusinesses",
     *      summary="Store a newly created master_status_business in storage",
     *      tags={"master_status_business"},
     *      description="Store master_status_business",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="master_status_business that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/master_status_business")
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
     *                  ref="#/definitions/master_status_business"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createmaster_status_businessAPIRequest $request)
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
     *      summary="Display the specified master_status_business",
     *      tags={"master_status_business"},
     *      description="Get master_status_business",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_status_business",
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
     *                  ref="#/definitions/master_status_business"
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
        /** @var master_status_business $masterStatusBusiness */
        $masterStatusBusiness = $this->masterStatusBusinessRepository->find($id);

        if (empty($masterStatusBusiness)) {
            return $this->sendError('Master Status Business not found');
        }

        return $this->sendResponse($masterStatusBusiness->toArray(), 'Master Status Business retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updatemaster_status_businessAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/masterStatusBusinesses/{id}",
     *      summary="Update the specified master_status_business in storage",
     *      tags={"master_status_business"},
     *      description="Update master_status_business",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_status_business",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="master_status_business that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/master_status_business")
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
     *                  ref="#/definitions/master_status_business"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updatemaster_status_businessAPIRequest $request)
    {
        $input = $request->all();

        /** @var master_status_business $masterStatusBusiness */
        $masterStatusBusiness = $this->masterStatusBusinessRepository->find($id);

        if (empty($masterStatusBusiness)) {
            return $this->sendError('Master Status Business not found');
        }

        $masterStatusBusiness = $this->masterStatusBusinessRepository->update($input, $id);

        return $this->sendResponse($masterStatusBusiness->toArray(), 'master_status_business updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/masterStatusBusinesses/{id}",
     *      summary="Remove the specified master_status_business from storage",
     *      tags={"master_status_business"},
     *      description="Delete master_status_business",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_status_business",
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
        /** @var master_status_business $masterStatusBusiness */
        $masterStatusBusiness = $this->masterStatusBusinessRepository->find($id);

        if (empty($masterStatusBusiness)) {
            return $this->sendError('Master Status Business not found');
        }

        $masterStatusBusiness->delete();

        return $this->sendSuccess('Master Status Business deleted successfully');
    }
}
