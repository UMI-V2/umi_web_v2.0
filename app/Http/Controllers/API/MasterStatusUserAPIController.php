<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMasterStatusUserAPIRequest;
use App\Http\Requests\API\UpdateMasterStatusUserAPIRequest;
use App\Models\MasterStatusUser;
use App\Repositories\MasterStatusUserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MasterStatusUserController
 * @package App\Http\Controllers\API
 */

class MasterStatusUserAPIController extends AppBaseController
{
    /** @var  MasterStatusUserRepository */
    private $masterStatusUserRepository;

    public function __construct(MasterStatusUserRepository $masterStatusUserRepo)
    {
        $this->masterStatusUserRepository = $masterStatusUserRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/masterStatusUsers",
     *      summary="Get a listing of the master_status_users.",
     *      tags={"MasterStatusUser"},
     *      description="Get all master_status_users",
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
     *                  @SWG\Items(ref="#/definitions/MasterStatusUser")
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
        $masterStatusUsers = $this->masterStatusUserRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($masterStatusUsers->toArray(), 'Master Status Users retrieved successfully');
    }

    /**
     * @param CreateMasterStatusUserAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/masterStatusUsers",
     *      summary="Store a newly created MasterStatusUser in storage",
     *      tags={"MasterStatusUser"},
     *      description="Store MasterStatusUser",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MasterStatusUser that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MasterStatusUser")
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
     *                  ref="#/definitions/MasterStatusUser"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMasterStatusUserAPIRequest $request)
    {
        $input = $request->all();

        $masterStatusUser = $this->masterStatusUserRepository->create($input);

        return $this->sendResponse($masterStatusUser->toArray(), 'Master Status User saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/masterStatusUsers/{id}",
     *      summary="Display the specified MasterStatusUser",
     *      tags={"MasterStatusUser"},
     *      description="Get MasterStatusUser",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterStatusUser",
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
     *                  ref="#/definitions/MasterStatusUser"
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
        /** @var MasterStatusUser $masterStatusUser */
        $masterStatusUser = $this->masterStatusUserRepository->find($id);

        if (empty($masterStatusUser)) {
            return $this->sendError('Master Status User not found');
        }

        return $this->sendResponse($masterStatusUser->toArray(), 'Master Status User retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMasterStatusUserAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/masterStatusUsers/{id}",
     *      summary="Update the specified MasterStatusUser in storage",
     *      tags={"MasterStatusUser"},
     *      description="Update MasterStatusUser",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterStatusUser",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MasterStatusUser that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MasterStatusUser")
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
     *                  ref="#/definitions/MasterStatusUser"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMasterStatusUserAPIRequest $request)
    {
        $input = $request->all();

        /** @var MasterStatusUser $masterStatusUser */
        $masterStatusUser = $this->masterStatusUserRepository->find($id);

        if (empty($masterStatusUser)) {
            return $this->sendError('Master Status User not found');
        }

        $masterStatusUser = $this->masterStatusUserRepository->update($input, $id);

        return $this->sendResponse($masterStatusUser->toArray(), 'MasterStatusUser updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/masterStatusUsers/{id}",
     *      summary="Remove the specified MasterStatusUser from storage",
     *      tags={"MasterStatusUser"},
     *      description="Delete MasterStatusUser",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterStatusUser",
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
        /** @var MasterStatusUser $masterStatusUser */
        $masterStatusUser = $this->masterStatusUserRepository->find($id);

        if (empty($masterStatusUser)) {
            return $this->sendError('Master Status User not found');
        }

        $masterStatusUser->delete();

        return $this->sendSuccess('Master Status User deleted successfully');
    }
}
