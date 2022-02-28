<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createmaster_payment_methodAPIRequest;
use App\Http\Requests\API\Updatemaster_payment_methodAPIRequest;
use App\Models\master_payment_method;
use App\Repositories\master_payment_methodRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class master_payment_methodController
 * @package App\Http\Controllers\API
 */

class master_payment_methodAPIController extends AppBaseController
{
    /** @var  master_payment_methodRepository */
    private $masterPaymentMethodRepository;

    public function __construct(master_payment_methodRepository $masterPaymentMethodRepo)
    {
        $this->masterPaymentMethodRepository = $masterPaymentMethodRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/masterPaymentMethods",
     *      summary="Get a listing of the master_payment_methods.",
     *      tags={"master_payment_method"},
     *      description="Get all master_payment_methods",
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
     *                  @SWG\Items(ref="#/definitions/master_payment_method")
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
        $masterPaymentMethods = $this->masterPaymentMethodRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($masterPaymentMethods->toArray(), 'Master Payment Methods retrieved successfully');
    }

    /**
     * @param Createmaster_payment_methodAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/masterPaymentMethods",
     *      summary="Store a newly created master_payment_method in storage",
     *      tags={"master_payment_method"},
     *      description="Store master_payment_method",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="master_payment_method that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/master_payment_method")
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
     *                  ref="#/definitions/master_payment_method"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createmaster_payment_methodAPIRequest $request)
    {
        $input = $request->all();

        $masterPaymentMethod = $this->masterPaymentMethodRepository->create($input);

        return $this->sendResponse($masterPaymentMethod->toArray(), 'Master Payment Method saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/masterPaymentMethods/{id}",
     *      summary="Display the specified master_payment_method",
     *      tags={"master_payment_method"},
     *      description="Get master_payment_method",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_payment_method",
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
     *                  ref="#/definitions/master_payment_method"
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
        /** @var master_payment_method $masterPaymentMethod */
        $masterPaymentMethod = $this->masterPaymentMethodRepository->find($id);

        if (empty($masterPaymentMethod)) {
            return $this->sendError('Master Payment Method not found');
        }

        return $this->sendResponse($masterPaymentMethod->toArray(), 'Master Payment Method retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updatemaster_payment_methodAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/masterPaymentMethods/{id}",
     *      summary="Update the specified master_payment_method in storage",
     *      tags={"master_payment_method"},
     *      description="Update master_payment_method",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_payment_method",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="master_payment_method that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/master_payment_method")
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
     *                  ref="#/definitions/master_payment_method"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updatemaster_payment_methodAPIRequest $request)
    {
        $input = $request->all();

        /** @var master_payment_method $masterPaymentMethod */
        $masterPaymentMethod = $this->masterPaymentMethodRepository->find($id);

        if (empty($masterPaymentMethod)) {
            return $this->sendError('Master Payment Method not found');
        }

        $masterPaymentMethod = $this->masterPaymentMethodRepository->update($input, $id);

        return $this->sendResponse($masterPaymentMethod->toArray(), 'master_payment_method updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/masterPaymentMethods/{id}",
     *      summary="Remove the specified master_payment_method from storage",
     *      tags={"master_payment_method"},
     *      description="Delete master_payment_method",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_payment_method",
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
        /** @var master_payment_method $masterPaymentMethod */
        $masterPaymentMethod = $this->masterPaymentMethodRepository->find($id);

        if (empty($masterPaymentMethod)) {
            return $this->sendError('Master Payment Method not found');
        }

        $masterPaymentMethod->delete();

        return $this->sendSuccess('Master Payment Method deleted successfully');
    }
}
