<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateShippingUsedAPIRequest;
use App\Http\Requests\API\UpdateShippingUsedAPIRequest;
use App\Models\ShippingUsed;
use App\Repositories\ShippingUsedRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ShippingUsedController
 * @package App\Http\Controllers\API
 */

class ShippingUsedAPIController extends AppBaseController
{
    /** @var  ShippingUsedRepository */
    private $shippingUsedRepository;

    public function __construct(ShippingUsedRepository $shippingUsedRepo)
    {
        $this->shippingUsedRepository = $shippingUsedRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shippingUseds",
     *      summary="Get a listing of the ShippingUseds.",
     *      tags={"ShippingUsed"},
     *      description="Get all ShippingUseds",
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
     *                  @SWG\Items(ref="#/definitions/ShippingUsed")
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
        $shippingUseds = $this->shippingUsedRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shippingUseds->toArray(), 'Shipping Useds retrieved successfully');
    }

    /**
     * @param CreateShippingUsedAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shippingUseds",
     *      summary="Store a newly created ShippingUsed in storage",
     *      tags={"ShippingUsed"},
     *      description="Store ShippingUsed",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ShippingUsed that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ShippingUsed")
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
     *                  ref="#/definitions/ShippingUsed"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateShippingUsedAPIRequest $request)
    {
        $input = $request->all();

        $shippingUsed = $this->shippingUsedRepository->create($input);

        return $this->sendResponse($shippingUsed->toArray(), 'Shipping Used saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shippingUseds/{id}",
     *      summary="Display the specified ShippingUsed",
     *      tags={"ShippingUsed"},
     *      description="Get ShippingUsed",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ShippingUsed",
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
     *                  ref="#/definitions/ShippingUsed"
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
        /** @var ShippingUsed $shippingUsed */
        $shippingUsed = $this->shippingUsedRepository->find($id);

        if (empty($shippingUsed)) {
            return $this->sendError('Shipping Used not found');
        }

        return $this->sendResponse($shippingUsed->toArray(), 'Shipping Used retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateShippingUsedAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shippingUseds/{id}",
     *      summary="Update the specified ShippingUsed in storage",
     *      tags={"ShippingUsed"},
     *      description="Update ShippingUsed",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ShippingUsed",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ShippingUsed that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ShippingUsed")
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
     *                  ref="#/definitions/ShippingUsed"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateShippingUsedAPIRequest $request)
    {
        $input = $request->all();

        /** @var ShippingUsed $shippingUsed */
        $shippingUsed = $this->shippingUsedRepository->find($id);

        if (empty($shippingUsed)) {
            return $this->sendError('Shipping Used not found');
        }

        $shippingUsed = $this->shippingUsedRepository->update($input, $id);

        return $this->sendResponse($shippingUsed->toArray(), 'ShippingUsed updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shippingUseds/{id}",
     *      summary="Remove the specified ShippingUsed from storage",
     *      tags={"ShippingUsed"},
     *      description="Delete ShippingUsed",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ShippingUsed",
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
        /** @var ShippingUsed $shippingUsed */
        $shippingUsed = $this->shippingUsedRepository->find($id);

        if (empty($shippingUsed)) {
            return $this->sendError('Shipping Used not found');
        }

        $shippingUsed->delete();

        return $this->sendSuccess('Shipping Used deleted successfully');
    }
}
