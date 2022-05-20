<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCityAPIRequest;
use App\Http\Requests\API\UpdateCityAPIRequest;
use App\Models\MasterCity;
use App\Repositories\MasterCityRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CityController
 * @package App\Http\Controllers\API
 */

class CityAPIController extends AppBaseController
{
    /** @var  MasterCityRepository */
    private $cityRepository;

    public function __construct(MasterCityRepository $masterCityRepo)
    {
        $this->cityRepository = $masterCityRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/master_cities",
     *      summary="Get a listing of the Cities.",
     *      tags={"MasterCity"},
     *      description="Get all Cities",
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
     *                  @SWG\Items(ref="#/definitions/MasterCity")
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
        $master_cities = $this->cityRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($master_cities->toArray(), 'Cities retrieved successfully');
    }

    /**
     * @param CreateCityAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/master_cities",
     *      summary="Store a newly created MasterCity in storage",
     *      tags={"MasterCity"},
     *      description="Store MasterCity",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MasterCity that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MasterCity")
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
     *                  ref="#/definitions/MasterCity"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCityAPIRequest $request)
    {
        $input = $request->all();

        $masterCity = $this->cityRepository->create($input);

        return $this->sendResponse($masterCity->toArray(), 'MasterCity saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/master_cities/{id}",
     *      summary="Display the specified MasterCity",
     *      tags={"MasterCity"},
     *      description="Get MasterCity",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterCity",
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
     *                  ref="#/definitions/MasterCity"
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
        /** @var MasterCity $masterCity */
        $masterCity = $this->cityRepository->find($id);

        if (empty($masterCity)) {
            return $this->sendError('MasterCity not found');
        }

        return $this->sendResponse($masterCity->toArray(), 'MasterCity retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCityAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/master_cities/{id}",
     *      summary="Update the specified MasterCity in storage",
     *      tags={"MasterCity"},
     *      description="Update MasterCity",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterCity",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MasterCity that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MasterCity")
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
     *                  ref="#/definitions/MasterCity"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCityAPIRequest $request)
    {
        $input = $request->all();

        /** @var MasterCity $masterCity */
        $masterCity = $this->cityRepository->find($id);

        if (empty($masterCity)) {
            return $this->sendError('MasterCity not found');
        }

        $masterCity = $this->cityRepository->update($input, $id);

        return $this->sendResponse($masterCity->toArray(), 'MasterCity updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/master_cities/{id}",
     *      summary="Remove the specified MasterCity from storage",
     *      tags={"MasterCity"},
     *      description="Delete MasterCity",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterCity",
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
        /** @var MasterCity $masterCity */
        $masterCity = $this->cityRepository->find($id);

        if (empty($masterCity)) {
            return $this->sendError('MasterCity not found');
        }

        $masterCity->delete();

        return $this->sendSuccess('MasterCity deleted successfully');
    }
}
