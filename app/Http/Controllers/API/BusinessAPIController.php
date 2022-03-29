<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBusinessAPIRequest;
use App\Http\Requests\API\UpdateBusinessAPIRequest;
use App\Models\Business;
use App\Repositories\BusinessRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BusinessController
 * @package App\Http\Controllers\API
 */

class BusinessAPIController extends AppBaseController
{
    /** @var  BusinessRepository */
    private $businessRepository;

    public function __construct(BusinessRepository $businessRepo)
    {
        $this->businessRepository = $businessRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/businesses",
     *      summary="Get a listing of the Businesses.",
     *      tags={"Business"},
     *      description="Get all Businesses",
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
     *                  @SWG\Items(ref="#/definitions/Business")
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
        $businesses = $this->businessRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($businesses->toArray(), 'Businesses retrieved successfully');
    }

    /**
     * @param CreateBusinessAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/businesses",
     *      summary="Store a newly created Business in storage",
     *      tags={"Business"},
     *      description="Store Business",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Business that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Business")
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
     *                  ref="#/definitions/Business"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateBusinessAPIRequest $request)
    {
        $input = $request->all();

        $business = $this->businessRepository->create($input);

        return $this->sendResponse($business->toArray(), 'Business saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/businesses/{id}",
     *      summary="Display the specified Business",
     *      tags={"Business"},
     *      description="Get Business",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Business",
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
     *                  ref="#/definitions/Business"
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
        /** @var Business $business */
        $business = $this->businessRepository->find($id);

        if (empty($business)) {
            return $this->sendError('Business not found');
        }

        return $this->sendResponse($business->toArray(), 'Business retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateBusinessAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/businesses/{id}",
     *      summary="Update the specified Business in storage",
     *      tags={"Business"},
     *      description="Update Business",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Business",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Business that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Business")
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
     *                  ref="#/definitions/Business"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateBusinessAPIRequest $request)
    {
        $input = $request->all();

        /** @var Business $business */
        $business = $this->businessRepository->find($id);

        if (empty($business)) {
            return $this->sendError('Business not found');
        }

        $business = $this->businessRepository->update($input, $id);

        return $this->sendResponse($business->toArray(), 'Business updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/businesses/{id}",
     *      summary="Remove the specified Business from storage",
     *      tags={"Business"},
     *      description="Delete Business",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Business",
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
        /** @var Business $business */
        $business = $this->businessRepository->find($id);

        if (empty($business)) {
            return $this->sendError('Business not found');
        }

        $business->delete();

        return $this->sendSuccess('Business deleted successfully');
    }
}
