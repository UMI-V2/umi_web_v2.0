<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTransactionStatusAPIRequest;
use App\Http\Requests\API\UpdateTransactionStatusAPIRequest;
use App\Models\TransactionStatus;
use App\Repositories\TransactionStatusRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TransactionStatusController
 * @package App\Http\Controllers\API
 */

class TransactionStatusAPIController extends AppBaseController
{
    /** @var  TransactionStatusRepository */
    private $transactionStatusRepository;

    public function __construct(TransactionStatusRepository $transactionStatusRepo)
    {
        $this->transactionStatusRepository = $transactionStatusRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/transactionStatuses",
     *      summary="Get a listing of the TransactionStatuses.",
     *      tags={"TransactionStatus"},
     *      description="Get all TransactionStatuses",
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
     *                  @SWG\Items(ref="#/definitions/TransactionStatus")
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
        $transactionStatuses = $this->transactionStatusRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($transactionStatuses->toArray(), 'Transaction Statuses retrieved successfully');
    }

    /**
     * @param CreateTransactionStatusAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/transactionStatuses",
     *      summary="Store a newly created TransactionStatus in storage",
     *      tags={"TransactionStatus"},
     *      description="Store TransactionStatus",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TransactionStatus that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TransactionStatus")
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
     *                  ref="#/definitions/TransactionStatus"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTransactionStatusAPIRequest $request)
    {
        $input = $request->all();

        $transactionStatus = $this->transactionStatusRepository->create($input);

        return $this->sendResponse($transactionStatus->toArray(), 'Transaction Status saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/transactionStatuses/{id}",
     *      summary="Display the specified TransactionStatus",
     *      tags={"TransactionStatus"},
     *      description="Get TransactionStatus",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TransactionStatus",
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
     *                  ref="#/definitions/TransactionStatus"
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
        /** @var TransactionStatus $transactionStatus */
        $transactionStatus = $this->transactionStatusRepository->find($id);

        if (empty($transactionStatus)) {
            return $this->sendError('Transaction Status not found');
        }

        return $this->sendResponse($transactionStatus->toArray(), 'Transaction Status retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTransactionStatusAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/transactionStatuses/{id}",
     *      summary="Update the specified TransactionStatus in storage",
     *      tags={"TransactionStatus"},
     *      description="Update TransactionStatus",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TransactionStatus",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TransactionStatus that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TransactionStatus")
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
     *                  ref="#/definitions/TransactionStatus"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTransactionStatusAPIRequest $request)
    {
        $input = $request->all();

        /** @var TransactionStatus $transactionStatus */
        $transactionStatus = $this->transactionStatusRepository->find($id);

        if (empty($transactionStatus)) {
            return $this->sendError('Transaction Status not found');
        }

        $transactionStatus = $this->transactionStatusRepository->update($input, $id);

        return $this->sendResponse($transactionStatus->toArray(), 'TransactionStatus updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/transactionStatuses/{id}",
     *      summary="Remove the specified TransactionStatus from storage",
     *      tags={"TransactionStatus"},
     *      description="Delete TransactionStatus",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TransactionStatus",
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
        /** @var TransactionStatus $transactionStatus */
        $transactionStatus = $this->transactionStatusRepository->find($id);

        if (empty($transactionStatus)) {
            return $this->sendError('Transaction Status not found');
        }

        $transactionStatus->delete();

        return $this->sendSuccess('Transaction Status deleted successfully');
    }
}
