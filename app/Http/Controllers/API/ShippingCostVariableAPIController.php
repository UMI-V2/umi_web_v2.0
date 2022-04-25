<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateShippingCostVariableAPIRequest;
use App\Http\Requests\API\UpdateShippingCostVariableAPIRequest;
use App\Models\ShippingCostVariable;
use App\Repositories\ShippingCostVariableRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ShippingCostVariableController
 * @package App\Http\Controllers\API
 */

class ShippingCostVariableAPIController extends AppBaseController
{
    /** @var  ShippingCostVariableRepository */
    private $shippingCostVariableRepository;

    public function __construct(ShippingCostVariableRepository $shippingCostVariableRepo)
    {
        $this->shippingCostVariableRepository = $shippingCostVariableRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shippingCostVariables",
     *      summary="Get a listing of the ShippingCostVariables.",
     *      tags={"ShippingCostVariable"},
     *      description="Get all ShippingCostVariables",
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
     *                  @SWG\Items(ref="#/definitions/ShippingCostVariable")
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
        $shippingCostVariables = $this->shippingCostVariableRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shippingCostVariables->toArray(), 'Shipping Cost Variables retrieved successfully');
    }

    /**
     * @param CreateShippingCostVariableAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shippingCostVariables",
     *      summary="Store a newly created ShippingCostVariable in storage",
     *      tags={"ShippingCostVariable"},
     *      description="Store ShippingCostVariable",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ShippingCostVariable that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ShippingCostVariable")
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
     *                  ref="#/definitions/ShippingCostVariable"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateShippingCostVariableAPIRequest $request)
    {
        $input = $request->all();

        $shippingCostVariable = $this->shippingCostVariableRepository->create($input);

        return $this->sendResponse($shippingCostVariable->toArray(), 'Shipping Cost Variable saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shippingCostVariables/{id}",
     *      summary="Display the specified ShippingCostVariable",
     *      tags={"ShippingCostVariable"},
     *      description="Get ShippingCostVariable",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ShippingCostVariable",
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
     *                  ref="#/definitions/ShippingCostVariable"
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
        /** @var ShippingCostVariable $shippingCostVariable */
        $shippingCostVariable = $this->shippingCostVariableRepository->find($id);

        if (empty($shippingCostVariable)) {
            return $this->sendError('Shipping Cost Variable not found');
        }

        return $this->sendResponse($shippingCostVariable->toArray(), 'Shipping Cost Variable retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateShippingCostVariableAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shippingCostVariables/{id}",
     *      summary="Update the specified ShippingCostVariable in storage",
     *      tags={"ShippingCostVariable"},
     *      description="Update ShippingCostVariable",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ShippingCostVariable",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ShippingCostVariable that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ShippingCostVariable")
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
     *                  ref="#/definitions/ShippingCostVariable"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateShippingCostVariableAPIRequest $request)
    {
        $input = $request->all();

        /** @var ShippingCostVariable $shippingCostVariable */
        $shippingCostVariable = $this->shippingCostVariableRepository->find($id);

        if (empty($shippingCostVariable)) {
            return $this->sendError('Shipping Cost Variable not found');
        }

        $shippingCostVariable = $this->shippingCostVariableRepository->update($input, $id);

        return $this->sendResponse($shippingCostVariable->toArray(), 'ShippingCostVariable updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shippingCostVariables/{id}",
     *      summary="Remove the specified ShippingCostVariable from storage",
     *      tags={"ShippingCostVariable"},
     *      description="Delete ShippingCostVariable",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ShippingCostVariable",
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
        /** @var ShippingCostVariable $shippingCostVariable */
        $shippingCostVariable = $this->shippingCostVariableRepository->find($id);

        if (empty($shippingCostVariable)) {
            return $this->sendError('Shipping Cost Variable not found');
        }

        $shippingCostVariable->delete();

        return $this->sendSuccess('Shipping Cost Variable deleted successfully');
    }
}
