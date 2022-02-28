<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createmaster_unitAPIRequest;
use App\Http\Requests\API\Updatemaster_unitAPIRequest;
use App\Models\master_unit;
use App\Repositories\master_unitRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class master_unitController
 * @package App\Http\Controllers\API
 */

class master_unitAPIController extends AppBaseController
{
    /** @var  master_unitRepository */
    private $masterUnitRepository;

    public function __construct(master_unitRepository $masterUnitRepo)
    {
        $this->masterUnitRepository = $masterUnitRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/masterUnits",
     *      summary="Get a listing of the master_units.",
     *      tags={"master_unit"},
     *      description="Get all master_units",
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
     *                  @SWG\Items(ref="#/definitions/master_unit")
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
        $masterUnits = $this->masterUnitRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($masterUnits->toArray(), 'Master Units retrieved successfully');
    }

    /**
     * @param Createmaster_unitAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/masterUnits",
     *      summary="Store a newly created master_unit in storage",
     *      tags={"master_unit"},
     *      description="Store master_unit",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="master_unit that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/master_unit")
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
     *                  ref="#/definitions/master_unit"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createmaster_unitAPIRequest $request)
    {
        $input = $request->all();

        $masterUnit = $this->masterUnitRepository->create($input);

        return $this->sendResponse($masterUnit->toArray(), 'Master Unit saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/masterUnits/{id}",
     *      summary="Display the specified master_unit",
     *      tags={"master_unit"},
     *      description="Get master_unit",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_unit",
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
     *                  ref="#/definitions/master_unit"
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
        /** @var master_unit $masterUnit */
        $masterUnit = $this->masterUnitRepository->find($id);

        if (empty($masterUnit)) {
            return $this->sendError('Master Unit not found');
        }

        return $this->sendResponse($masterUnit->toArray(), 'Master Unit retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updatemaster_unitAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/masterUnits/{id}",
     *      summary="Update the specified master_unit in storage",
     *      tags={"master_unit"},
     *      description="Update master_unit",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_unit",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="master_unit that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/master_unit")
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
     *                  ref="#/definitions/master_unit"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updatemaster_unitAPIRequest $request)
    {
        $input = $request->all();

        /** @var master_unit $masterUnit */
        $masterUnit = $this->masterUnitRepository->find($id);

        if (empty($masterUnit)) {
            return $this->sendError('Master Unit not found');
        }

        $masterUnit = $this->masterUnitRepository->update($input, $id);

        return $this->sendResponse($masterUnit->toArray(), 'master_unit updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/masterUnits/{id}",
     *      summary="Remove the specified master_unit from storage",
     *      tags={"master_unit"},
     *      description="Delete master_unit",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_unit",
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
        /** @var master_unit $masterUnit */
        $masterUnit = $this->masterUnitRepository->find($id);

        if (empty($masterUnit)) {
            return $this->sendError('Master Unit not found');
        }

        $masterUnit->delete();

        return $this->sendSuccess('Master Unit deleted successfully');
    }
}
