<?php

namespace App\Http\Controllers\API;

use Response;
use Exception;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\master_product_category;
use App\Http\Controllers\AppBaseController;
use App\Repositories\MasterProductCategoryRepository;
use App\Repositories\master_product_categoryRepository;
use App\Http\Requests\API\CreateMasterProductCategoryAPIRequest;
use App\Http\Requests\API\UpdateMasterProductCategoryAPIRequest;
use App\Http\Requests\API\Createmaster_product_categoryAPIRequest;
use App\Http\Requests\API\Updatemaster_product_categoryAPIRequest;

/**
 * Class MasterProductCategoryController
 * @package App\Http\Controllers\API
 */

class MasterProductCategoryAPIController extends AppBaseController
{
    /** @var  MasterProductCategoryRepository */
    private $masterProductCategoryRepository;

    public function __construct(MasterProductCategoryRepository $masterProductCategoryRepo)
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
     *      tags={"MasterProductCategory"},
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
     *                  @SWG\Items(ref="#/definitions/MasterProductCategory")
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
     * @param CreateMasterProductCategoryAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/masterProductCategories",
     *      summary="Store a newly created MasterProductCategory in storage",
     *      tags={"MasterProductCategory"},
     *      description="Store MasterProductCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MasterProductCategory that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MasterProductCategory")
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
     *                  ref="#/definitions/MasterProductCategory"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMasterProductCategoryAPIRequest $request)
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
     *      summary="Display the specified MasterProductCategory",
     *      tags={"MasterProductCategory"},
     *      description="Get MasterProductCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterProductCategory",
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
     *                  ref="#/definitions/MasterProductCategory"
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
        /** @var MasterProductCategory $masterProductCategory */
        $masterProductCategory = $this->masterProductCategoryRepository->find($id);

        if (empty($masterProductCategory)) {
            return $this->sendError('Master Product Category not found');
        }

        return $this->sendResponse($masterProductCategory->toArray(), 'Master Product Category retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMasterProductCategoryAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/masterProductCategories/{id}",
     *      summary="Update the specified MasterProductCategory in storage",
     *      tags={"MasterProductCategory"},
     *      description="Update MasterProductCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterProductCategory",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MasterProductCategory that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MasterProductCategory")
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
     *                  ref="#/definitions/MasterProductCategory"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMasterProductCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var MasterProductCategory $masterProductCategory */
        $masterProductCategory = $this->masterProductCategoryRepository->find($id);

        if (empty($masterProductCategory)) {
            return $this->sendError('Master Product Category not found');
        }

        $masterProductCategory = $this->masterProductCategoryRepository->update($input, $id);

        return $this->sendResponse($masterProductCategory->toArray(), 'MasterProductCategory updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/masterProductCategories/{id}",
     *      summary="Remove the specified MasterProductCategory from storage",
     *      tags={"MasterProductCategory"},
     *      description="Delete MasterProductCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterProductCategory",
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
        /** @var MasterProductCategory $masterProductCategory */
        $masterProductCategory = $this->masterProductCategoryRepository->find($id);

        if (empty($masterProductCategory)) {
            return $this->sendError('Master Product Category not found');
        }

        $masterProductCategory->delete();

        return $this->sendSuccess('Master Product Category deleted successfully');
    }
}
