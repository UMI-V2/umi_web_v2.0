<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOpenHourAPIRequest;
use App\Http\Requests\API\UpdateOpenHourAPIRequest;
use App\Models\OpenHour;
use App\Repositories\OpenHourRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class OpenHourController
 * @package App\Http\Controllers\API
 */

class OpenHourAPIController extends AppBaseController
{
    /** @var  OpenHourRepository */
    private $openHourRepository;

    public function __construct(OpenHourRepository $openHourRepo)
    {
        $this->openHourRepository = $openHourRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/openHours",
     *      summary="Get a listing of the OpenHours.",
     *      tags={"OpenHour"},
     *      description="Get all OpenHours",
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
     *                  @SWG\Items(ref="#/definitions/OpenHour")
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
        $openHours = $this->openHourRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($openHours->toArray(), 'Open Hours retrieved successfully');
    }

    /**
     * @param CreateOpenHourAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/openHours",
     *      summary="Store a newly created OpenHour in storage",
     *      tags={"OpenHour"},
     *      description="Store OpenHour",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="OpenHour that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/OpenHour")
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
     *                  ref="#/definitions/OpenHour"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateOpenHourAPIRequest $request)
    {
        $input = $request->all();

        $openHour = $this->openHourRepository->create($input);

        return $this->sendResponse($openHour->toArray(), 'Open Hour saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/openHours/{id}",
     *      summary="Display the specified OpenHour",
     *      tags={"OpenHour"},
     *      description="Get OpenHour",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of OpenHour",
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
     *                  ref="#/definitions/OpenHour"
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
        /** @var OpenHour $openHour */
        $openHour = $this->openHourRepository->find($id);

        if (empty($openHour)) {
            return $this->sendError('Open Hour not found');
        }

        return $this->sendResponse($openHour->toArray(), 'Open Hour retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateOpenHourAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/openHours/{id}",
     *      summary="Update the specified OpenHour in storage",
     *      tags={"OpenHour"},
     *      description="Update OpenHour",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of OpenHour",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="OpenHour that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/OpenHour")
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
     *                  ref="#/definitions/OpenHour"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateOpenHourAPIRequest $request)
    {
        $input = $request->all();

        /** @var OpenHour $openHour */
        $openHour = $this->openHourRepository->find($id);

        if (empty($openHour)) {
            return $this->sendError('Open Hour not found');
        }

        $openHour = $this->openHourRepository->update($input, $id);

        return $this->sendResponse($openHour->toArray(), 'OpenHour updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/openHours/{id}",
     *      summary="Remove the specified OpenHour from storage",
     *      tags={"OpenHour"},
     *      description="Delete OpenHour",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of OpenHour",
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
        /** @var OpenHour $openHour */
        $openHour = $this->openHourRepository->find($id);

        if (empty($openHour)) {
            return $this->sendError('Open Hour not found');
        }

        $openHour->delete();

        return $this->sendSuccess('Open Hour deleted successfully');
    }
}
