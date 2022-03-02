<?php

namespace App\Http\Controllers\API;

use Response;
use Exception;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\master_business_category;
use App\Http\Controllers\AppBaseController;
use App\Repositories\master_business_categoryRepository;
use App\Http\Requests\API\Createmaster_business_categoryAPIRequest;
use App\Http\Requests\API\Updatemaster_business_categoryAPIRequest;

/**
 * Class master_business_categoryController
 * @package App\Http\Controllers\API
 */

class master_business_categoryAPIController extends AppBaseController
{
    // master_business_categoryAPIController
    // MasterBisinessCategoryAPI
    /** @var  master_business_categoryRepository */
    private $masterBusinessCategoryRepository;

    public function __construct(master_business_categoryRepository $masterBusinessCategoryRepo)
    {
        $this->masterBusinessCategoryRepository = $masterBusinessCategoryRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/masterBusinessCategories",
     *      summary="Get a listing of the master_business_categories.",
     *      tags={"master_business_category"},
     *      description="Get all master_business_categories",
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
     *                  @SWG\Items(ref="#/definitions/master_business_category")
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
            $masterBusinessCategories = $this->masterBusinessCategoryRepository->all(
                $request->except(['skip', 'limit']),
                $request->get('skip'),
                $request->get('limit')
            );
            // return data ketika data sukses
            return ResponseFormatter::success($masterBusinessCategories, 'Master Business Categories retrieved successfully');

        } catch (Exception $e) {
            // return data ketika data error
            return ResponseFormatter::error(null,'Master Business Categories retrieved Error');
        }
        

    }

    /**
     * @param Createmaster_business_categoryAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/masterBusinessCategories",
     *      summary="Store a newly created master_business_category in storage",
     *      tags={"master_business_category"},
     *      description="Store master_business_category",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="master_business_category that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/master_business_category")
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
     *                  ref="#/definitions/master_business_category"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createmaster_business_categoryAPIRequest $request)
    {
        $input = $request->all();
        // dd("Disini");

        $masterBusinessCategory = $this->masterBusinessCategoryRepository->create($input);

        // return $this->sendResponse($masterBusinessCategory->toArray(), 'Master Business Category saved successfully');
        return ResponseFormatter::success($masterBusinessCategory, 'Master Business Category saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/masterBusinessCategories/{id}",
     *      summary="Display the specified master_business_category",
     *      tags={"master_business_category"},
     *      description="Get master_business_category",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_business_category",
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
     *                  ref="#/definitions/master_business_category"
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
        /** @var master_business_category $masterBusinessCategory */
        $masterBusinessCategory = $this->masterBusinessCategoryRepository->find($id);

        if (empty($masterBusinessCategory)) {
            return $this->sendError('Master Business Category not found');
        }

        return $this->sendResponse($masterBusinessCategory->toArray(), 'Master Business Category retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updatemaster_business_categoryAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/masterBusinessCategories/{id}",
     *      summary="Update the specified master_business_category in storage",
     *      tags={"master_business_category"},
     *      description="Update master_business_category",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_business_category",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="master_business_category that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/master_business_category")
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
     *                  ref="#/definitions/master_business_category"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updatemaster_business_categoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var master_business_category $masterBusinessCategory */
        $masterBusinessCategory = $this->masterBusinessCategoryRepository->find($id);

        if (empty($masterBusinessCategory)) {
            return $this->sendError('Master Business Category not found');
        }

        $masterBusinessCategory = $this->masterBusinessCategoryRepository->update($input, $id);

        return $this->sendResponse($masterBusinessCategory->toArray(), 'master_business_category updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/masterBusinessCategories/{id}",
     *      summary="Remove the specified master_business_category from storage",
     *      tags={"master_business_category"},
     *      description="Delete master_business_category",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_business_category",
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
        /** @var master_business_category $masterBusinessCategory */
        $masterBusinessCategory = $this->masterBusinessCategoryRepository->find($id);

        if (empty($masterBusinessCategory)) {
            return $this->sendError('Master Business Category not found');
        }

        $masterBusinessCategory->delete();

        return $this->sendSuccess('Master Business Category deleted successfully');
    }
}
