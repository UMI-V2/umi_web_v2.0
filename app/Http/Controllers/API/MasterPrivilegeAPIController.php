<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMasterPrivilegeAPIRequest;
use App\Http\Requests\API\UpdateMasterPrivilegeAPIRequest;
use App\Models\MasterPrivilege;
use App\Repositories\MasterPrivilegeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MasterPrivilegeController
 * @package App\Http\Controllers\API
 */

class MasterPrivilegeAPIController extends AppBaseController
{
    /** @var  MasterPrivilegeRepository */
    private $masterPrivilegeRepository;

    public function __construct(MasterPrivilegeRepository $masterPrivilegeRepo)
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
     *      tags={"MasterPrivilege"},
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
     *                  @SWG\Items(ref="#/definitions/MasterPrivilege")
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
     * @param CreateMasterPrivilegeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/masterPrivileges",
     *      summary="Store a newly created MasterPrivilege in storage",
     *      tags={"MasterPrivilege"},
     *      description="Store MasterPrivilege",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MasterPrivilege that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MasterPrivilege")
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
     *                  ref="#/definitions/MasterPrivilege"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMasterPrivilegeAPIRequest $request)
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
     *      summary="Display the specified MasterPrivilege",
     *      tags={"MasterPrivilege"},
     *      description="Get MasterPrivilege",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterPrivilege",
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
     *                  ref="#/definitions/MasterPrivilege"
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
        /** @var MasterPrivilege $masterPrivilege */
        $masterPrivilege = $this->masterPrivilegeRepository->find($id);

        if (empty($masterPrivilege)) {
            return $this->sendError('Master Privilege not found');
        }

        return $this->sendResponse($masterPrivilege->toArray(), 'Master Privilege retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMasterPrivilegeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/masterPrivileges/{id}",
     *      summary="Update the specified MasterPrivilege in storage",
     *      tags={"MasterPrivilege"},
     *      description="Update MasterPrivilege",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterPrivilege",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MasterPrivilege that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MasterPrivilege")
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
     *                  ref="#/definitions/MasterPrivilege"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMasterPrivilegeAPIRequest $request)
    {
        $input = $request->all();

        /** @var MasterPrivilege $masterPrivilege */
        $masterPrivilege = $this->masterPrivilegeRepository->find($id);

        if (empty($masterPrivilege)) {
            return $this->sendError('Master Privilege not found');
        }

        $masterPrivilege = $this->masterPrivilegeRepository->update($input, $id);

        return $this->sendResponse($masterPrivilege->toArray(), 'MasterPrivilege updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/masterPrivileges/{id}",
     *      summary="Remove the specified MasterPrivilege from storage",
     *      tags={"MasterPrivilege"},
     *      description="Delete MasterPrivilege",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MasterPrivilege",
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
        /** @var MasterPrivilege $masterPrivilege */
        $masterPrivilege = $this->masterPrivilegeRepository->find($id);

        if (empty($masterPrivilege)) {
            return $this->sendError('Master Privilege not found');
        }

        $masterPrivilege->delete();

        return $this->sendSuccess('Master Privilege deleted successfully');
    }
}
