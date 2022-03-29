<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBusinessCategoryAPIRequest;
use App\Http\Requests\API\UpdateBusinessCategoryAPIRequest;
use App\Models\BusinessCategory;
use App\Repositories\BusinessCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BusinessCategoryController
 * @package App\Http\Controllers\API
 */

class BusinessCategoryAPIController extends AppBaseController
{
    /** @var  BusinessCategoryRepository */
    private $businessCategoryRepository;

    public function __construct(BusinessCategoryRepository $businessCategoryRepo)
    {
        $this->businessCategoryRepository = $businessCategoryRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/businessCategories",
     *      summary="Get a listing of the BusinessCategories.",
     *      tags={"BusinessCategory"},
     *      description="Get all BusinessCategories",
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
     *                  @SWG\Items(ref="#/definitions/BusinessCategory")
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
        $businessCategories = $this->businessCategoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($businessCategories->toArray(), 'Business Categories retrieved successfully');
    }

    /**
     * @param CreateBusinessCategoryAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/businessCategories",
     *      summary="Store a newly created BusinessCategory in storage",
     *      tags={"BusinessCategory"},
     *      description="Store BusinessCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="BusinessCategory that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/BusinessCategory")
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
     *                  ref="#/definitions/BusinessCategory"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateBusinessCategoryAPIRequest $request)
    {
        $input = $request->all();

        $businessCategory = $this->businessCategoryRepository->create($input);

        return $this->sendResponse($businessCategory->toArray(), 'Business Category saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/businessCategories/{id}",
     *      summary="Display the specified BusinessCategory",
     *      tags={"BusinessCategory"},
     *      description="Get BusinessCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of BusinessCategory",
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
     *                  ref="#/definitions/BusinessCategory"
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
        /** @var BusinessCategory $businessCategory */
        $businessCategory = $this->businessCategoryRepository->find($id);

        if (empty($businessCategory)) {
            return $this->sendError('Business Category not found');
        }

        return $this->sendResponse($businessCategory->toArray(), 'Business Category retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateBusinessCategoryAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/businessCategories/{id}",
     *      summary="Update the specified BusinessCategory in storage",
     *      tags={"BusinessCategory"},
     *      description="Update BusinessCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of BusinessCategory",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="BusinessCategory that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/BusinessCategory")
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
     *                  ref="#/definitions/BusinessCategory"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateBusinessCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var BusinessCategory $businessCategory */
        $businessCategory = $this->businessCategoryRepository->find($id);

        if (empty($businessCategory)) {
            return $this->sendError('Business Category not found');
        }

        $businessCategory = $this->businessCategoryRepository->update($input, $id);

        return $this->sendResponse($businessCategory->toArray(), 'BusinessCategory updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/businessCategories/{id}",
     *      summary="Remove the specified BusinessCategory from storage",
     *      tags={"BusinessCategory"},
     *      description="Delete BusinessCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of BusinessCategory",
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
        /** @var BusinessCategory $businessCategory */
        $businessCategory = $this->businessCategoryRepository->find($id);

        if (empty($businessCategory)) {
            return $this->sendError('Business Category not found');
        }

        $businessCategory->delete();

        return $this->sendSuccess('Business Category deleted successfully');
    }
}
