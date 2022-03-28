<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMasterUnitAPIRequest;
use App\Http\Requests\API\UpdateMasterUnitAPIRequest;
use App\Models\MasterUnit;
use App\Repositories\MasterUnitRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MasterUnitController
 * @package App\Http\Controllers\API
 */

class MasterUnitAPIController extends AppBaseController
{
    /** @var  MasterUnitRepository */
    private $masterUnitRepository;

    public function __construct(MasterUnitRepository $masterUnitRepo)
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
     *      tags={"MasterUnit"},
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
     *                  @SWG\Items(ref="#/definitions/MasterUnit")
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
     * @param CreateMasterUnitAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/masterUnits",
     *      summary="Store a newly created MasterUnit in storage",
     *      tags={"MasterUnit"},
     *      description="Store MasterUnit",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MasterUnit that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MasterUnit")
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
     *                  ref="#/definitions/MasterUnit"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMasterUnitAPIRequest $request)
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
     *      summary="Display the specified MasterUnit",
     *      tags={"MasterUnit"},
     *      description="Get MasterUnit",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterUnit",
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
     *                  ref="#/definitions/MasterUnit"
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
        /** @var MasterUnit $masterUnit */
        $masterUnit = $this->masterUnitRepository->find($id);

        if (empty($masterUnit)) {
            return $this->sendError('Master Unit not found');
        }

        return $this->sendResponse($masterUnit->toArray(), 'Master Unit retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMasterUnitAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/masterUnits/{id}",
     *      summary="Update the specified MasterUnit in storage",
     *      tags={"MasterUnit"},
     *      description="Update MasterUnit",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterUnit",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MasterUnit that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MasterUnit")
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
     *                  ref="#/definitions/MasterUnit"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMasterUnitAPIRequest $request)
    {
        $input = $request->all();

        /** @var MasterUnit $masterUnit */
        $masterUnit = $this->masterUnitRepository->find($id);

        if (empty($masterUnit)) {
            return $this->sendError('Master Unit not found');
        }

        $masterUnit = $this->masterUnitRepository->update($input, $id);

        return $this->sendResponse($masterUnit->toArray(), 'MasterUnit updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/masterUnits/{id}",
     *      summary="Remove the specified MasterUnit from storage",
     *      tags={"MasterUnit"},
     *      description="Delete MasterUnit",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterUnit",
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
        /** @var MasterUnit $masterUnit */
        $masterUnit = $this->masterUnitRepository->find($id);

        if (empty($masterUnit)) {
            return $this->sendError('Master Unit not found');
        }

        $masterUnit->delete();

        return $this->sendSuccess('Master Unit deleted successfully');
    }
}
