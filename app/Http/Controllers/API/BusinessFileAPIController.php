<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBusinessFileAPIRequest;
use App\Http\Requests\API\UpdateBusinessFileAPIRequest;
use App\Models\BusinessFile;
use App\Repositories\BusinessFileRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BusinessFileController
 * @package App\Http\Controllers\API
 */

class BusinessFileAPIController extends AppBaseController
{
    /** @var  BusinessFileRepository */
    private $businessFileRepository;

    public function __construct(BusinessFileRepository $businessFileRepo)
    {
        $this->businessFileRepository = $businessFileRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/businessFiles",
     *      summary="Get a listing of the BusinessFiles.",
     *      tags={"BusinessFile"},
     *      description="Get all BusinessFiles",
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
     *                  @SWG\Items(ref="#/definitions/BusinessFile")
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
        $businessFiles = $this->businessFileRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($businessFiles->toArray(), 'Business Files retrieved successfully');
    }

    /**
     * @param CreateBusinessFileAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/businessFiles",
     *      summary="Store a newly created BusinessFile in storage",
     *      tags={"BusinessFile"},
     *      description="Store BusinessFile",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="BusinessFile that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/BusinessFile")
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
     *                  ref="#/definitions/BusinessFile"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateBusinessFileAPIRequest $request)
    {
        $input = $request->all();

        $businessFile = $this->businessFileRepository->create($input);

        return $this->sendResponse($businessFile->toArray(), 'Business File saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/businessFiles/{id}",
     *      summary="Display the specified BusinessFile",
     *      tags={"BusinessFile"},
     *      description="Get BusinessFile",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of BusinessFile",
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
     *                  ref="#/definitions/BusinessFile"
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
        /** @var BusinessFile $businessFile */
        $businessFile = $this->businessFileRepository->find($id);

        if (empty($businessFile)) {
            return $this->sendError('Business File not found');
        }

        return $this->sendResponse($businessFile->toArray(), 'Business File retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateBusinessFileAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/businessFiles/{id}",
     *      summary="Update the specified BusinessFile in storage",
     *      tags={"BusinessFile"},
     *      description="Update BusinessFile",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of BusinessFile",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="BusinessFile that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/BusinessFile")
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
     *                  ref="#/definitions/BusinessFile"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateBusinessFileAPIRequest $request)
    {
        $input = $request->all();

        /** @var BusinessFile $businessFile */
        $businessFile = $this->businessFileRepository->find($id);

        if (empty($businessFile)) {
            return $this->sendError('Business File not found');
        }

        $businessFile = $this->businessFileRepository->update($input, $id);

        return $this->sendResponse($businessFile->toArray(), 'BusinessFile updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/businessFiles/{id}",
     *      summary="Remove the specified BusinessFile from storage",
     *      tags={"BusinessFile"},
     *      description="Delete BusinessFile",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of BusinessFile",
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
        /** @var BusinessFile $businessFile */
        $businessFile = $this->businessFileRepository->find($id);

        if (empty($businessFile)) {
            return $this->sendError('Business File not found');
        }

        $businessFile->delete();

        return $this->sendSuccess('Business File deleted successfully');
    }
}
