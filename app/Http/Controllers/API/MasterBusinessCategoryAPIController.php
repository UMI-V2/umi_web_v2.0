<?php

namespace App\Http\Controllers\API;

use Response;
use Exception;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\MasterBusinessCategory;
use App\Http\Controllers\AppBaseController;
use App\Repositories\MasterBusinessCategoryRepository;
use App\Http\Requests\API\CreateMasterBusinessCategoryAPIRequest;
use App\Http\Requests\API\UpdateMasterBusinessCategoryAPIRequest;

/**
 * Class MasterBusinessCategoryController
 * @package App\Http\Controllers\API
 */

class MasterBusinessCategoryAPIController extends AppBaseController
{
    // MasterBusinessCategoryAPIController
    // MasterBisinessCategoryAPI
    /** @var  MasterBusinessCategoryRepository */
    private $masterBusinessCategoryRepository;

    public function __construct(MasterBusinessCategoryRepository $masterBusinessCategoryRepo)
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
     *      tags={"MasterBusinessCategory"},
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
     *                  @SWG\Items(ref="#/definitions/MasterBusinessCategory")
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
     * @param CreateMasterBusinessCategoryAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/masterBusinessCategories",
     *      summary="Store a newly created MasterBusinessCategory in storage",
     *      tags={"MasterBusinessCategory"},
     *      description="Store MasterBusinessCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MasterBusinessCategory that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MasterBusinessCategory")
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
     *                  ref="#/definitions/MasterBusinessCategory"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMasterBusinessCategoryAPIRequest $request)
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
     *      summary="Display the specified MasterBusinessCategory",
     *      tags={"MasterBusinessCategory"},
     *      description="Get MasterBusinessCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterBusinessCategory",
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
     *                  ref="#/definitions/MasterBusinessCategory"
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
        /** @var MasterBusinessCategory $masterBusinessCategory */
        $masterBusinessCategory = $this->masterBusinessCategoryRepository->find($id);

        if (empty($masterBusinessCategory)) {
            return $this->sendError('Master Business Category not found');
        }

        return $this->sendResponse($masterBusinessCategory->toArray(), 'Master Business Category retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMasterBusinessCategoryAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/masterBusinessCategories/{id}",
     *      summary="Update the specified MasterBusinessCategory in storage",
     *      tags={"MasterBusinessCategory"},
     *      description="Update MasterBusinessCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterBusinessCategory",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MasterBusinessCategory that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MasterBusinessCategory")
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
     *                  ref="#/definitions/MasterBusinessCategory"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMasterBusinessCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var MasterBusinessCategory $masterBusinessCategory */
        $masterBusinessCategory = $this->masterBusinessCategoryRepository->find($id);

        if (empty($masterBusinessCategory)) {
            return $this->sendError('Master Business Category not found');
        }

        $masterBusinessCategory = $this->masterBusinessCategoryRepository->update($input, $id);

        return $this->sendResponse($masterBusinessCategory->toArray(), 'MasterBusinessCategory updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/masterBusinessCategories/{id}",
     *      summary="Remove the specified MasterBusinessCategory from storage",
     *      tags={"MasterBusinessCategory"},
     *      description="Delete MasterBusinessCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterBusinessCategory",
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
        /** @var MasterBusinessCategory $masterBusinessCategory */
        $masterBusinessCategory = $this->masterBusinessCategoryRepository->find($id);

        if (empty($masterBusinessCategory)) {
            return $this->sendError('Master Business Category not found');
        }

        $masterBusinessCategory->delete();

        return $this->sendSuccess('Master Business Category deleted successfully');
    }
}
