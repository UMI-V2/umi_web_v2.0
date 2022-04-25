<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSubDistrictAPIRequest;
use App\Http\Requests\API\UpdateSubDistrictAPIRequest;
use App\Models\SubDistrict;
use App\Repositories\SubDistrictRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SubDistrictController
 * @package App\Http\Controllers\API
 */

class SubDistrictAPIController extends AppBaseController
{
    /** @var  SubDistrictRepository */
    private $subDistrictRepository;

    public function __construct(SubDistrictRepository $subDistrictRepo)
    {
        $this->subDistrictRepository = $subDistrictRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/subDistricts",
     *      summary="Get a listing of the SubDistricts.",
     *      tags={"SubDistrict"},
     *      description="Get all SubDistricts",
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
     *                  @SWG\Items(ref="#/definitions/SubDistrict")
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
        $subDistricts = $this->subDistrictRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($subDistricts->toArray(), 'Sub Districts retrieved successfully');
    }

    /**
     * @param CreateSubDistrictAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/subDistricts",
     *      summary="Store a newly created SubDistrict in storage",
     *      tags={"SubDistrict"},
     *      description="Store SubDistrict",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SubDistrict that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SubDistrict")
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
     *                  ref="#/definitions/SubDistrict"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateSubDistrictAPIRequest $request)
    {
        $input = $request->all();

        $subDistrict = $this->subDistrictRepository->create($input);

        return $this->sendResponse($subDistrict->toArray(), 'Sub District saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/subDistricts/{id}",
     *      summary="Display the specified SubDistrict",
     *      tags={"SubDistrict"},
     *      description="Get SubDistrict",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubDistrict",
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
     *                  ref="#/definitions/SubDistrict"
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
        /** @var SubDistrict $subDistrict */
        $subDistrict = $this->subDistrictRepository->find($id);

        if (empty($subDistrict)) {
            return $this->sendError('Sub District not found');
        }

        return $this->sendResponse($subDistrict->toArray(), 'Sub District retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateSubDistrictAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/subDistricts/{id}",
     *      summary="Update the specified SubDistrict in storage",
     *      tags={"SubDistrict"},
     *      description="Update SubDistrict",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubDistrict",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SubDistrict that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SubDistrict")
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
     *                  ref="#/definitions/SubDistrict"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateSubDistrictAPIRequest $request)
    {
        $input = $request->all();

        /** @var SubDistrict $subDistrict */
        $subDistrict = $this->subDistrictRepository->find($id);

        if (empty($subDistrict)) {
            return $this->sendError('Sub District not found');
        }

        $subDistrict = $this->subDistrictRepository->update($input, $id);

        return $this->sendResponse($subDistrict->toArray(), 'SubDistrict updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/subDistricts/{id}",
     *      summary="Remove the specified SubDistrict from storage",
     *      tags={"SubDistrict"},
     *      description="Delete SubDistrict",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubDistrict",
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
        /** @var SubDistrict $subDistrict */
        $subDistrict = $this->subDistrictRepository->find($id);

        if (empty($subDistrict)) {
            return $this->sendError('Sub District not found');
        }

        $subDistrict->delete();

        return $this->sendSuccess('Sub District deleted successfully');
    }
}
