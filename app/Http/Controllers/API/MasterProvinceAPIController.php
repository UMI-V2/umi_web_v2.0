<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMasterProvinceAPIRequest;
use App\Http\Requests\API\UpdateMasterProvinceAPIRequest;
use App\Models\MasterProvince;
use App\Repositories\MasterProvinceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MasterProvinceController
 * @package App\Http\Controllers\API
 */

class MasterProvinceAPIController extends AppBaseController
{
    /** @var  MasterProvinceRepository */
    private $masterProvinceRepository;

    public function __construct(MasterProvinceRepository $masterProvinceRepo)
    {
        $this->masterProvinceRepository = $masterProvinceRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/masterProvinces",
     *      summary="Get a listing of the master_provinces.",
     *      tags={"MasterProvince"},
     *      description="Get all master_provinces",
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
     *                  @SWG\Items(ref="#/definitions/MasterProvince")
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
        $masterProvinces = $this->masterProvinceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($masterProvinces->toArray(), 'Master Provinces retrieved successfully');
    }

    /**
     * @param CreateMasterProvinceAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/masterProvinces",
     *      summary="Store a newly created MasterProvince in storage",
     *      tags={"MasterProvince"},
     *      description="Store MasterProvince",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MasterProvince that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MasterProvince")
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
     *                  ref="#/definitions/MasterProvince"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMasterProvinceAPIRequest $request)
    {
        $input = $request->all();

        $masterProvince = $this->masterProvinceRepository->create($input);

        return $this->sendResponse($masterProvince->toArray(), 'Master Province saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/masterProvinces/{id}",
     *      summary="Display the specified MasterProvince",
     *      tags={"MasterProvince"},
     *      description="Get MasterProvince",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterProvince",
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
     *                  ref="#/definitions/MasterProvince"
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
        /** @var MasterProvince $masterProvince */
        $masterProvince = $this->masterProvinceRepository->find($id);

        if (empty($masterProvince)) {
            return $this->sendError('Master Province not found');
        }

        return $this->sendResponse($masterProvince->toArray(), 'Master Province retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMasterProvinceAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/masterProvinces/{id}",
     *      summary="Update the specified MasterProvince in storage",
     *      tags={"MasterProvince"},
     *      description="Update MasterProvince",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterProvince",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MasterProvince that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MasterProvince")
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
     *                  ref="#/definitions/MasterProvince"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMasterProvinceAPIRequest $request)
    {
        $input = $request->all();

        /** @var MasterProvince $masterProvince */
        $masterProvince = $this->masterProvinceRepository->find($id);

        if (empty($masterProvince)) {
            return $this->sendError('Master Province not found');
        }

        $masterProvince = $this->masterProvinceRepository->update($input, $id);

        return $this->sendResponse($masterProvince->toArray(), 'MasterProvince updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/masterProvinces/{id}",
     *      summary="Remove the specified MasterProvince from storage",
     *      tags={"MasterProvince"},
     *      description="Delete MasterProvince",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterProvince",
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
        /** @var MasterProvince $masterProvince */
        $masterProvince = $this->masterProvinceRepository->find($id);

        if (empty($masterProvince)) {
            return $this->sendError('Master Province not found');
        }

        $masterProvince->delete();

        return $this->sendSuccess('Master Province deleted successfully');
    }
}
