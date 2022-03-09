<?php

namespace App\Http\Controllers\API;

use Response;
use Exception;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\master_product_category;
use App\Http\Controllers\AppBaseController;
use App\Repositories\master_product_categoryRepository;
use App\Http\Requests\API\Createmaster_product_categoryAPIRequest;
use App\Http\Requests\API\Updatemaster_product_categoryAPIRequest;

/**
 * Class master_product_categoryController
 * @package App\Http\Controllers\API
 */

class master_product_categoryAPIController extends AppBaseController
{
    /** @var  master_product_categoryRepository */
    private $masterProductCategoryRepository;

    public function __construct(master_product_categoryRepository $masterProductCategoryRepo)
    {
        $this->masterProductCategoryRepository = $masterProductCategoryRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/masterProductCategories",
     *      summary="Get a listing of the master_product_categories.",
     *      tags={"master_product_category"},
     *      description="Get all master_product_categories",
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
     *                  @SWG\Items(ref="#/definitions/master_product_category")
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
        try {
            $masterProductCategories = $this->masterProductCategoryRepository->all(
                $request->except(['skip', 'limit']),
                $request->get('skip'),
                $request->get('limit')
            );
    
            return $this->sendResponse($masterProductCategories->toArray(), 'Master Kategori Produk retrieved successfully');
            } catch (Exception $error) {
            
        }
    }

    /**
     * @param Createmaster_product_categoryAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/masterProductCategories",
     *      summary="Store a newly created master_product_category in storage",
     *      tags={"master_product_category"},
     *      description="Store master_product_category",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="master_product_category that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/master_product_category")
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
     *                  ref="#/definitions/master_product_category"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createmaster_product_categoryAPIRequest $request)
    {
        $input = $request->all();

        $masterProductCategory = $this->masterProductCategoryRepository->create($input);
        return ResponseFormatter::success(
            $masterProductCategory,
            'Master Product Category saved successfully',
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/masterProductCategories/{id}",
     *      summary="Display the specified master_product_category",
     *      tags={"master_product_category"},
     *      description="Get master_product_category",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_product_category",
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
     *                  ref="#/definitions/master_product_category"
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
        /** @var master_product_category $masterProductCategory */
        $masterProductCategory = $this->masterProductCategoryRepository->find($id);

        if (empty($masterProductCategory)) {
            return $this->sendError('Master Product Category not found');
        }

        return $this->sendResponse($masterProductCategory->toArray(), 'Master Product Category retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updatemaster_product_categoryAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/masterProductCategories/{id}",
     *      summary="Update the specified master_product_category in storage",
     *      tags={"master_product_category"},
     *      description="Update master_product_category",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_product_category",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="master_product_category that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/master_product_category")
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
     *                  ref="#/definitions/master_product_category"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updatemaster_product_categoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var master_product_category $masterProductCategory */
        $masterProductCategory = $this->masterProductCategoryRepository->find($id);

        if (empty($masterProductCategory)) {
            return $this->sendError('Master Product Category not found');
        }

        $masterProductCategory = $this->masterProductCategoryRepository->update($input, $id);

        return $this->sendResponse($masterProductCategory->toArray(), 'master_product_category updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/masterProductCategories/{id}",
     *      summary="Remove the specified master_product_category from storage",
     *      tags={"master_product_category"},
     *      description="Delete master_product_category",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_product_category",
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
        /** @var master_product_category $masterProductCategory */
        $masterProductCategory = $this->masterProductCategoryRepository->find($id);

        if (empty($masterProductCategory)) {
            return $this->sendError('Master Product Category not found');
        }

        $masterProductCategory->delete();

        return $this->sendSuccess('Master Product Category deleted successfully');
    }
}
