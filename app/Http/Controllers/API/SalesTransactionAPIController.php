<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSalesTransactionAPIRequest;
use App\Http\Requests\API\UpdateSalesTransactionAPIRequest;
use App\Models\SalesTransaction;
use App\Repositories\SalesTransactionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SalesTransactionController
 * @package App\Http\Controllers\API
 */

class SalesTransactionAPIController extends AppBaseController
{
    /** @var  SalesTransactionRepository */
    private $salesTransactionRepository;

    public function __construct(SalesTransactionRepository $salesTransactionRepo)
    {
        $this->salesTransactionRepository = $salesTransactionRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/salesTransactions",
     *      summary="Get a listing of the SalesTransactions.",
     *      tags={"SalesTransaction"},
     *      description="Get all SalesTransactions",
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
     *                  @SWG\Items(ref="#/definitions/SalesTransaction")
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
        $salesTransactions = $this->salesTransactionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($salesTransactions->toArray(), 'Sales Transactions retrieved successfully');
    }

    /**
     * @param CreateSalesTransactionAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/salesTransactions",
     *      summary="Store a newly created SalesTransaction in storage",
     *      tags={"SalesTransaction"},
     *      description="Store SalesTransaction",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SalesTransaction that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SalesTransaction")
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
     *                  ref="#/definitions/SalesTransaction"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateSalesTransactionAPIRequest $request)
    {
        $input = $request->all();

        $salesTransaction = $this->salesTransactionRepository->create($input);

        return $this->sendResponse($salesTransaction->toArray(), 'Sales Transaction saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/salesTransactions/{id}",
     *      summary="Display the specified SalesTransaction",
     *      tags={"SalesTransaction"},
     *      description="Get SalesTransaction",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SalesTransaction",
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
     *                  ref="#/definitions/SalesTransaction"
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
        /** @var SalesTransaction $salesTransaction */
        $salesTransaction = $this->salesTransactionRepository->find($id);

        if (empty($salesTransaction)) {
            return $this->sendError('Sales Transaction not found');
        }

        return $this->sendResponse($salesTransaction->toArray(), 'Sales Transaction retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateSalesTransactionAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/salesTransactions/{id}",
     *      summary="Update the specified SalesTransaction in storage",
     *      tags={"SalesTransaction"},
     *      description="Update SalesTransaction",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SalesTransaction",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SalesTransaction that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SalesTransaction")
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
     *                  ref="#/definitions/SalesTransaction"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateSalesTransactionAPIRequest $request)
    {
        $input = $request->all();

        /** @var SalesTransaction $salesTransaction */
        $salesTransaction = $this->salesTransactionRepository->find($id);

        if (empty($salesTransaction)) {
            return $this->sendError('Sales Transaction not found');
        }

        $salesTransaction = $this->salesTransactionRepository->update($input, $id);

        return $this->sendResponse($salesTransaction->toArray(), 'SalesTransaction updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/salesTransactions/{id}",
     *      summary="Remove the specified SalesTransaction from storage",
     *      tags={"SalesTransaction"},
     *      description="Delete SalesTransaction",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SalesTransaction",
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
        /** @var SalesTransaction $salesTransaction */
        $salesTransaction = $this->salesTransactionRepository->find($id);

        if (empty($salesTransaction)) {
            return $this->sendError('Sales Transaction not found');
        }

        $salesTransaction->delete();

        return $this->sendSuccess('Sales Transaction deleted successfully');
    }
}
