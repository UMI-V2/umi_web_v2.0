<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createmaster_privilegeAPIRequest;
use App\Http\Requests\API\Updatemaster_privilegeAPIRequest;
use App\Models\master_privilege;
use App\Repositories\master_privilegeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class master_privilegeController
 * @package App\Http\Controllers\API
 */

class master_privilegeAPIController extends AppBaseController
{
    /** @var  master_privilegeRepository */
    private $masterPrivilegeRepository;

    public function __construct(master_privilegeRepository $masterPrivilegeRepo)
    {
        $this->masterPrivilegeRepository = $masterPrivilegeRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/masterPrivileges",
     *      summary="Get a listing of the master_privileges.",
     *      tags={"master_privilege"},
     *      description="Get all master_privileges",
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
     *                  @SWG\Items(ref="#/definitions/master_privilege")
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
        $masterPrivileges = $this->masterPrivilegeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($masterPrivileges->toArray(), 'Master Privileges retrieved successfully');
    }

    /**
     * @param Createmaster_privilegeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/masterPrivileges",
     *      summary="Store a newly created master_privilege in storage",
     *      tags={"master_privilege"},
     *      description="Store master_privilege",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="master_privilege that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/master_privilege")
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
     *                  ref="#/definitions/master_privilege"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createmaster_privilegeAPIRequest $request)
    {
        $input = $request->all();

        $masterPrivilege = $this->masterPrivilegeRepository->create($input);

        return $this->sendResponse($masterPrivilege->toArray(), 'Master Privilege saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/masterPrivileges/{id}",
     *      summary="Display the specified master_privilege",
     *      tags={"master_privilege"},
     *      description="Get master_privilege",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_privilege",
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
     *                  ref="#/definitions/master_privilege"
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
        /** @var master_privilege $masterPrivilege */
        $masterPrivilege = $this->masterPrivilegeRepository->find($id);

        if (empty($masterPrivilege)) {
            return $this->sendError('Master Privilege not found');
        }

        return $this->sendResponse($masterPrivilege->toArray(), 'Master Privilege retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updatemaster_privilegeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/masterPrivileges/{id}",
     *      summary="Update the specified master_privilege in storage",
     *      tags={"master_privilege"},
     *      description="Update master_privilege",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_privilege",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="master_privilege that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/master_privilege")
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
     *                  ref="#/definitions/master_privilege"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updatemaster_privilegeAPIRequest $request)
    {
        $input = $request->all();

        /** @var master_privilege $masterPrivilege */
        $masterPrivilege = $this->masterPrivilegeRepository->find($id);

        if (empty($masterPrivilege)) {
            return $this->sendError('Master Privilege not found');
        }

        $masterPrivilege = $this->masterPrivilegeRepository->update($input, $id);

        return $this->sendResponse($masterPrivilege->toArray(), 'master_privilege updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/masterPrivileges/{id}",
     *      summary="Remove the specified master_privilege from storage",
     *      tags={"master_privilege"},
     *      description="Delete master_privilege",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of master_privilege",
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
        /** @var master_privilege $masterPrivilege */
        $masterPrivilege = $this->masterPrivilegeRepository->find($id);

        if (empty($masterPrivilege)) {
            return $this->sendError('Master Privilege not found');
        }

        $masterPrivilege->delete();

        return $this->sendSuccess('Master Privilege deleted successfully');
    }
}
