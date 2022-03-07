<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createmaster_status_userAPIRequest;
use App\Http\Requests\API\Updatemaster_status_userAPIRequest;
use App\Models\master_status_user;
use App\Repositories\master_status_userRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class master_status_userController
 * @package App\Http\Controllers\API
 */

class master_status_userAPIController extends AppBaseController
{
    /** @var  master_status_userRepository */
    private $masterStatusUserRepository;

    public function __construct(master_status_userRepository $masterStatusUserRepo)
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
     *      tags={"master_status_user"},
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
     *                  @SWG\Items(ref="#/definitions/master_status_user")
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
     * @param Createmaster_status_userAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/masterStatusUsers",
     *      summary="Store a newly created master_status_user in storage",
     *      tags={"master_status_user"},
     *      description="Store master_status_user",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="master_status_user that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/master_status_user")
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
     *                  ref="#/definitions/master_status_user"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createmaster_status_userAPIRequest $request)
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
     *      summary="Display the specified master_status_user",
     *      tags={"master_status_user"},
     *      description="Get master_status_user",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_status_user",
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
     *                  ref="#/definitions/master_status_user"
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
        /** @var master_status_user $masterStatusUser */
        $masterStatusUser = $this->masterStatusUserRepository->find($id);

        if (empty($masterStatusUser)) {
            return $this->sendError('Master Status User not found');
        }

        return $this->sendResponse($masterStatusUser->toArray(), 'Master Status User retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updatemaster_status_userAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/masterStatusUsers/{id}",
     *      summary="Update the specified master_status_user in storage",
     *      tags={"master_status_user"},
     *      description="Update master_status_user",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_status_user",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="master_status_user that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/master_status_user")
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
     *                  ref="#/definitions/master_status_user"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updatemaster_status_userAPIRequest $request)
    {
        $input = $request->all();

        /** @var master_status_user $masterStatusUser */
        $masterStatusUser = $this->masterStatusUserRepository->find($id);

        if (empty($masterStatusUser)) {
            return $this->sendError('Master Status User not found');
        }

        $masterStatusUser = $this->masterStatusUserRepository->update($input, $id);

        return $this->sendResponse($masterStatusUser->toArray(), 'master_status_user updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/masterStatusUsers/{id}",
     *      summary="Remove the specified master_status_user from storage",
     *      tags={"master_status_user"},
     *      description="Delete master_status_user",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_status_user",
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
        /** @var master_status_user $masterStatusUser */
        $masterStatusUser = $this->masterStatusUserRepository->find($id);

        if (empty($masterStatusUser)) {
            return $this->sendError('Master Status User not found');
        }

        $masterStatusUser->delete();

        return $this->sendSuccess('Master Status User deleted successfully');
    }
}
