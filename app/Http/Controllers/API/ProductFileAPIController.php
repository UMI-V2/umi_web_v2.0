<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProductFileAPIRequest;
use App\Http\Requests\API\UpdateProductFileAPIRequest;
use App\Models\ProductFile;
use App\Repositories\ProductFileRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ProductFileController
 * @package App\Http\Controllers\API
 */

class ProductFileAPIController extends AppBaseController
{
    /** @var  ProductFileRepository */
    private $productFileRepository;

    public function __construct(ProductFileRepository $productFileRepo)
    {
        $this->productFileRepository = $productFileRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/productFiles",
     *      summary="Get a listing of the ProductFiles.",
     *      tags={"ProductFile"},
     *      description="Get all ProductFiles",
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
     *                  @SWG\Items(ref="#/definitions/ProductFile")
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
        $productFiles = $this->productFileRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($productFiles->toArray(), 'Product Files retrieved successfully');
    }

    /**
     * @param CreateProductFileAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/productFiles",
     *      summary="Store a newly created ProductFile in storage",
     *      tags={"ProductFile"},
     *      description="Store ProductFile",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ProductFile that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProductFile")
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
     *                  ref="#/definitions/ProductFile"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateProductFileAPIRequest $request)
    {
        $input = $request->all();

        $productFile = $this->productFileRepository->create($input);

        return $this->sendResponse($productFile->toArray(), 'Product File saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/productFiles/{id}",
     *      summary="Display the specified ProductFile",
     *      tags={"ProductFile"},
     *      description="Get ProductFile",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProductFile",
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
     *                  ref="#/definitions/ProductFile"
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
        /** @var ProductFile $productFile */
        $productFile = $this->productFileRepository->find($id);

        if (empty($productFile)) {
            return $this->sendError('Product File not found');
        }

        return $this->sendResponse($productFile->toArray(), 'Product File retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateProductFileAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/productFiles/{id}",
     *      summary="Update the specified ProductFile in storage",
     *      tags={"ProductFile"},
     *      description="Update ProductFile",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProductFile",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ProductFile that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProductFile")
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
     *                  ref="#/definitions/ProductFile"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateProductFileAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProductFile $productFile */
        $productFile = $this->productFileRepository->find($id);

        if (empty($productFile)) {
            return $this->sendError('Product File not found');
        }

        $productFile = $this->productFileRepository->update($input, $id);

        return $this->sendResponse($productFile->toArray(), 'ProductFile updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/productFiles/{id}",
     *      summary="Remove the specified ProductFile from storage",
     *      tags={"ProductFile"},
     *      description="Delete ProductFile",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProductFile",
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
        /** @var ProductFile $productFile */
        $productFile = $this->productFileRepository->find($id);

        if (empty($productFile)) {
            return $this->sendError('Product File not found');
        }

        $productFile->delete();

        return $this->sendSuccess('Product File deleted successfully');
    }
}
