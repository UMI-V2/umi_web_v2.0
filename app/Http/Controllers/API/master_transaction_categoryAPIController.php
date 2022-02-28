<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createmaster_transaction_categoryAPIRequest;
use App\Http\Requests\API\Updatemaster_transaction_categoryAPIRequest;
use App\Models\master_transaction_category;
use App\Repositories\master_transaction_categoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class master_transaction_categoryController
 * @package App\Http\Controllers\API
 */

class master_transaction_categoryAPIController extends AppBaseController
{
    /** @var  master_transaction_categoryRepository */
    private $masterTransactionCategoryRepository;

    public function __construct(master_transaction_categoryRepository $masterTransactionCategoryRepo)
    {
        $this->masterTransactionCategoryRepository = $masterTransactionCategoryRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/masterTransactionCategories",
     *      summary="Get a listing of the master_transaction_categories.",
     *      tags={"master_transaction_category"},
     *      description="Get all master_transaction_categories",
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
     *                  @SWG\Items(ref="#/definitions/master_transaction_category")
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
        $masterTransactionCategories = $this->masterTransactionCategoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($masterTransactionCategories->toArray(), 'Master Transaction Categories retrieved successfully');
    }

    /**
     * @param Createmaster_transaction_categoryAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/masterTransactionCategories",
     *      summary="Store a newly created master_transaction_category in storage",
     *      tags={"master_transaction_category"},
     *      description="Store master_transaction_category",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="master_transaction_category that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/master_transaction_category")
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
     *                  ref="#/definitions/master_transaction_category"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createmaster_transaction_categoryAPIRequest $request)
    {
        $input = $request->all();

        $masterTransactionCategory = $this->masterTransactionCategoryRepository->create($input);

        return $this->sendResponse($masterTransactionCategory->toArray(), 'Master Transaction Category saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/masterTransactionCategories/{id}",
     *      summary="Display the specified master_transaction_category",
     *      tags={"master_transaction_category"},
     *      description="Get master_transaction_category",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_transaction_category",
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
     *                  ref="#/definitions/master_transaction_category"
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
        /** @var master_transaction_category $masterTransactionCategory */
        $masterTransactionCategory = $this->masterTransactionCategoryRepository->find($id);

        if (empty($masterTransactionCategory)) {
            return $this->sendError('Master Transaction Category not found');
        }

        return $this->sendResponse($masterTransactionCategory->toArray(), 'Master Transaction Category retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updatemaster_transaction_categoryAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/masterTransactionCategories/{id}",
     *      summary="Update the specified master_transaction_category in storage",
     *      tags={"master_transaction_category"},
     *      description="Update master_transaction_category",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_transaction_category",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="master_transaction_category that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/master_transaction_category")
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
     *                  ref="#/definitions/master_transaction_category"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updatemaster_transaction_categoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var master_transaction_category $masterTransactionCategory */
        $masterTransactionCategory = $this->masterTransactionCategoryRepository->find($id);

        if (empty($masterTransactionCategory)) {
            return $this->sendError('Master Transaction Category not found');
        }

        $masterTransactionCategory = $this->masterTransactionCategoryRepository->update($input, $id);

        return $this->sendResponse($masterTransactionCategory->toArray(), 'master_transaction_category updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/masterTransactionCategories/{id}",
     *      summary="Remove the specified master_transaction_category from storage",
     *      tags={"master_transaction_category"},
     *      description="Delete master_transaction_category",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_transaction_category",
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
        /** @var master_transaction_category $masterTransactionCategory */
        $masterTransactionCategory = $this->masterTransactionCategoryRepository->find($id);

        if (empty($masterTransactionCategory)) {
            return $this->sendError('Master Transaction Category not found');
        }

        $masterTransactionCategory->delete();

        return $this->sendSuccess('Master Transaction Category deleted successfully');
    }
}
