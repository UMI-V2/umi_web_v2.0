<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createmaster_provinceAPIRequest;
use App\Http\Requests\API\Updatemaster_provinceAPIRequest;
use App\Models\master_province;
use App\Repositories\master_provinceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class master_provinceController
 * @package App\Http\Controllers\API
 */

class master_provinceAPIController extends AppBaseController
{
    /** @var  master_provinceRepository */
    private $masterProvinceRepository;

    public function __construct(master_provinceRepository $masterProvinceRepo)
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
     *      tags={"master_province"},
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
     *                  @SWG\Items(ref="#/definitions/master_province")
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
     * @param Createmaster_provinceAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/masterProvinces",
     *      summary="Store a newly created master_province in storage",
     *      tags={"master_province"},
     *      description="Store master_province",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="master_province that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/master_province")
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
     *                  ref="#/definitions/master_province"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createmaster_provinceAPIRequest $request)
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
     *      summary="Display the specified master_province",
     *      tags={"master_province"},
     *      description="Get master_province",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_province",
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
     *                  ref="#/definitions/master_province"
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
        /** @var master_province $masterProvince */
        $masterProvince = $this->masterProvinceRepository->find($id);

        if (empty($masterProvince)) {
            return $this->sendError('Master Province not found');
        }

        return $this->sendResponse($masterProvince->toArray(), 'Master Province retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updatemaster_provinceAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/masterProvinces/{id}",
     *      summary="Update the specified master_province in storage",
     *      tags={"master_province"},
     *      description="Update master_province",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_province",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="master_province that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/master_province")
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
     *                  ref="#/definitions/master_province"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updatemaster_provinceAPIRequest $request)
    {
        $input = $request->all();

        /** @var master_province $masterProvince */
        $masterProvince = $this->masterProvinceRepository->find($id);

        if (empty($masterProvince)) {
            return $this->sendError('Master Province not found');
        }

        $masterProvince = $this->masterProvinceRepository->update($input, $id);

        return $this->sendResponse($masterProvince->toArray(), 'master_province updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/masterProvinces/{id}",
     *      summary="Remove the specified master_province from storage",
     *      tags={"master_province"},
     *      description="Delete master_province",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_province",
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
        /** @var master_province $masterProvince */
        $masterProvince = $this->masterProvinceRepository->find($id);

        if (empty($masterProvince)) {
            return $this->sendError('Master Province not found');
        }

        $masterProvince->delete();

        return $this->sendSuccess('Master Province deleted successfully');
    }
}
