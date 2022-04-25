<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTransactionProductAPIRequest;
use App\Http\Requests\API\UpdateTransactionProductAPIRequest;
use App\Models\TransactionProduct;
use App\Repositories\TransactionProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TransactionProductController
 * @package App\Http\Controllers\API
 */

class TransactionProductAPIController extends AppBaseController
{
    /** @var  TransactionProductRepository */
    private $transactionProductRepository;

    public function __construct(TransactionProductRepository $transactionProductRepo)
    {
        $this->transactionProductRepository = $transactionProductRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/transactionProducts",
     *      summary="Get a listing of the TransactionProducts.",
     *      tags={"TransactionProduct"},
     *      description="Get all TransactionProducts",
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
     *                  @SWG\Items(ref="#/definitions/TransactionProduct")
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
        $transactionProducts = $this->transactionProductRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($transactionProducts->toArray(), 'Transaction Products retrieved successfully');
    }

    /**
     * @param CreateTransactionProductAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/transactionProducts",
     *      summary="Store a newly created TransactionProduct in storage",
     *      tags={"TransactionProduct"},
     *      description="Store TransactionProduct",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TransactionProduct that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TransactionProduct")
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
     *                  ref="#/definitions/TransactionProduct"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTransactionProductAPIRequest $request)
    {
        $input = $request->all();

        $transactionProduct = $this->transactionProductRepository->create($input);

        return $this->sendResponse($transactionProduct->toArray(), 'Transaction Product saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/transactionProducts/{id}",
     *      summary="Display the specified TransactionProduct",
     *      tags={"TransactionProduct"},
     *      description="Get TransactionProduct",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TransactionProduct",
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
     *                  ref="#/definitions/TransactionProduct"
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
        /** @var TransactionProduct $transactionProduct */
        $transactionProduct = $this->transactionProductRepository->find($id);

        if (empty($transactionProduct)) {
            return $this->sendError('Transaction Product not found');
        }

        return $this->sendResponse($transactionProduct->toArray(), 'Transaction Product retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTransactionProductAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/transactionProducts/{id}",
     *      summary="Update the specified TransactionProduct in storage",
     *      tags={"TransactionProduct"},
     *      description="Update TransactionProduct",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TransactionProduct",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TransactionProduct that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TransactionProduct")
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
     *                  ref="#/definitions/TransactionProduct"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTransactionProductAPIRequest $request)
    {
        $input = $request->all();

        /** @var TransactionProduct $transactionProduct */
        $transactionProduct = $this->transactionProductRepository->find($id);

        if (empty($transactionProduct)) {
            return $this->sendError('Transaction Product not found');
        }

        $transactionProduct = $this->transactionProductRepository->update($input, $id);

        return $this->sendResponse($transactionProduct->toArray(), 'TransactionProduct updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/transactionProducts/{id}",
     *      summary="Remove the specified TransactionProduct from storage",
     *      tags={"TransactionProduct"},
     *      description="Delete TransactionProduct",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TransactionProduct",
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
        /** @var TransactionProduct $transactionProduct */
        $transactionProduct = $this->transactionProductRepository->find($id);

        if (empty($transactionProduct)) {
            return $this->sendError('Transaction Product not found');
        }

        $transactionProduct->delete();

        return $this->sendSuccess('Transaction Product deleted successfully');
    }
}
