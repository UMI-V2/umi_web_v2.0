<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMasterPaymentMethodAPIRequest;
use App\Http\Requests\API\UpdateMasterPaymentMethodAPIRequest;
use App\Models\MasterPaymentMethod;
use App\Repositories\MasterPaymentMethodRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MasterPaymentMethodController
 * @package App\Http\Controllers\API
 */

class MasterPaymentMethodAPIController extends AppBaseController
{
    /** @var  MasterPaymentMethodRepository */
    private $masterPaymentMethodRepository;

    public function __construct(MasterPaymentMethodRepository $masterPaymentMethodRepo)
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
     *      tags={"MasterPaymentMethod"},
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
     *                  @SWG\Items(ref="#/definitions/MasterPaymentMethod")
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
     * @param CreateMasterPaymentMethodAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/masterPaymentMethods",
     *      summary="Store a newly created MasterPaymentMethod in storage",
     *      tags={"MasterPaymentMethod"},
     *      description="Store MasterPaymentMethod",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MasterPaymentMethod that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MasterPaymentMethod")
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
     *                  ref="#/definitions/MasterPaymentMethod"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMasterPaymentMethodAPIRequest $request)
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
     *      summary="Display the specified MasterPaymentMethod",
     *      tags={"MasterPaymentMethod"},
     *      description="Get MasterPaymentMethod",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterPaymentMethod",
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
     *                  ref="#/definitions/MasterPaymentMethod"
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
        /** @var MasterPaymentMethod $masterPaymentMethod */
        $masterPaymentMethod = $this->masterPaymentMethodRepository->find($id);

        if (empty($masterPaymentMethod)) {
            return $this->sendError('Master Payment Method not found');
        }

        return $this->sendResponse($masterPaymentMethod->toArray(), 'Master Payment Method retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMasterPaymentMethodAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/masterPaymentMethods/{id}",
     *      summary="Update the specified MasterPaymentMethod in storage",
     *      tags={"MasterPaymentMethod"},
     *      description="Update MasterPaymentMethod",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterPaymentMethod",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MasterPaymentMethod that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MasterPaymentMethod")
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
     *                  ref="#/definitions/MasterPaymentMethod"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMasterPaymentMethodAPIRequest $request)
    {
        $input = $request->all();

        /** @var MasterPaymentMethod $masterPaymentMethod */
        $masterPaymentMethod = $this->masterPaymentMethodRepository->find($id);

        if (empty($masterPaymentMethod)) {
            return $this->sendError('Master Payment Method not found');
        }

        $masterPaymentMethod = $this->masterPaymentMethodRepository->update($input, $id);

        return $this->sendResponse($masterPaymentMethod->toArray(), 'MasterPaymentMethod updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/masterPaymentMethods/{id}",
     *      summary="Remove the specified MasterPaymentMethod from storage",
     *      tags={"MasterPaymentMethod"},
     *      description="Delete MasterPaymentMethod",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterPaymentMethod",
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
        /** @var MasterPaymentMethod $masterPaymentMethod */
        $masterPaymentMethod = $this->masterPaymentMethodRepository->find($id);

        if (empty($masterPaymentMethod)) {
            return $this->sendError('Master Payment Method not found');
        }

        $masterPaymentMethod->delete();

        return $this->sendSuccess('Master Payment Method deleted successfully');
    }
}
