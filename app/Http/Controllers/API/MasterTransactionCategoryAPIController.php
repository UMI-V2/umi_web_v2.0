<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMasterTransactionCategoryAPIRequest;
use App\Http\Requests\API\UpdateMasterTransactionCategoryAPIRequest;
use App\Models\MasterTransactionCategory;
use App\Repositories\MasterTransactionCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MasterTransactionCategoryController
 * @package App\Http\Controllers\API
 */

class MasterTransactionCategoryAPIController extends AppBaseController
{
    /** @var  MasterTransactionCategoryRepository */
    private $masterTransactionCategoryRepository;

    public function __construct(MasterTransactionCategoryRepository $masterTransactionCategoryRepo)
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
     *      tags={"MasterTransactionCategory"},
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
     *                  @SWG\Items(ref="#/definitions/MasterTransactionCategory")
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
     * @param CreateMasterTransactionCategoryAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/masterTransactionCategories",
     *      summary="Store a newly created MasterTransactionCategory in storage",
     *      tags={"MasterTransactionCategory"},
     *      description="Store MasterTransactionCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MasterTransactionCategory that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MasterTransactionCategory")
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
     *                  ref="#/definitions/MasterTransactionCategory"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMasterTransactionCategoryAPIRequest $request)
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
     *      summary="Display the specified MasterTransactionCategory",
     *      tags={"MasterTransactionCategory"},
     *      description="Get MasterTransactionCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterTransactionCategory",
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
     *                  ref="#/definitions/MasterTransactionCategory"
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
        /** @var MasterTransactionCategory $masterTransactionCategory */
        $masterTransactionCategory = $this->masterTransactionCategoryRepository->find($id);

        if (empty($masterTransactionCategory)) {
            return $this->sendError('Master Transaction Category not found');
        }

        return $this->sendResponse($masterTransactionCategory->toArray(), 'Master Transaction Category retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMasterTransactionCategoryAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/masterTransactionCategories/{id}",
     *      summary="Update the specified MasterTransactionCategory in storage",
     *      tags={"MasterTransactionCategory"},
     *      description="Update MasterTransactionCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterTransactionCategory",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MasterTransactionCategory that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MasterTransactionCategory")
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
     *                  ref="#/definitions/MasterTransactionCategory"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMasterTransactionCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var MasterTransactionCategory $masterTransactionCategory */
        $masterTransactionCategory = $this->masterTransactionCategoryRepository->find($id);

        if (empty($masterTransactionCategory)) {
            return $this->sendError('Master Transaction Category not found');
        }

        $masterTransactionCategory = $this->masterTransactionCategoryRepository->update($input, $id);

        return $this->sendResponse($masterTransactionCategory->toArray(), 'MasterTransactionCategory updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/masterTransactionCategories/{id}",
     *      summary="Remove the specified MasterTransactionCategory from storage",
     *      tags={"MasterTransactionCategory"},
     *      description="Delete MasterTransactionCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterTransactionCategory",
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
        /** @var MasterTransactionCategory $masterTransactionCategory */
        $masterTransactionCategory = $this->masterTransactionCategoryRepository->find($id);

        if (empty($masterTransactionCategory)) {
            return $this->sendError('Master Transaction Category not found');
        }

        $masterTransactionCategory->delete();

        return $this->sendSuccess('Master Transaction Category deleted successfully');
    }
}
