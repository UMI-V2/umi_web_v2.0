<?php

namespace App\Http\Controllers;

use App\DataTables\master_privilegeDataTable;
use App\Http\Requests;
use App\Http\Requests\Createmaster_privilegeRequest;
use App\Http\Requests\Updatemaster_privilegeRequest;
use App\Repositories\master_privilegeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class master_privilegeController extends AppBaseController
{
    /** @var master_privilegeRepository $masterPrivilegeRepository*/
    private $masterPrivilegeRepository;

    public function __construct(master_privilegeRepository $masterPrivilegeRepo)
    {
        $this->masterPrivilegeRepository = $masterPrivilegeRepo;
    }

    /**
     * Display a listing of the master_privilege.
     *
     * @param master_privilegeDataTable $masterPrivilegeDataTable
     *
     * @return Response
     */
    public function index(master_privilegeDataTable $masterPrivilegeDataTable)
    {
        return $masterPrivilegeDataTable->render('master_privileges.index');
    }

    /**
     * Show the form for creating a new master_privilege.
     *
     * @return Response
     */
    public function create()
    {
        return view('master_privileges.create');
    }

    /**
     * Store a newly created master_privilege in storage.
     *
     * @param Createmaster_privilegeRequest $request
     *
     * @return Response
     */
    public function store(Createmaster_privilegeRequest $request)
    {
        $input = $request->all();

        $masterPrivilege = $this->masterPrivilegeRepository->create($input);

        Flash::success('Master Privilege saved successfully.');

        return redirect(route('masterPrivileges.index'));
    }

    /**
     * Display the specified master_privilege.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterPrivilege = $this->masterPrivilegeRepository->find($id);

        if (empty($masterPrivilege)) {
            Flash::error('Master Privilege not found');

            return redirect(route('masterPrivileges.index'));
        }

        return view('master_privileges.show')->with('masterPrivilege', $masterPrivilege);
    }

    /**
     * Show the form for editing the specified master_privilege.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterPrivilege = $this->masterPrivilegeRepository->find($id);

        if (empty($masterPrivilege)) {
            Flash::error('Master Privilege not found');

            return redirect(route('masterPrivileges.index'));
        }

        return view('master_privileges.edit')->with('masterPrivilege', $masterPrivilege);
    }

    /**
     * Update the specified master_privilege in storage.
     *
     * @param int $id
     * @param Updatemaster_privilegeRequest $request
     *
     * @return Response
     */
    public function update($id, Updatemaster_privilegeRequest $request)
    {
        $masterPrivilege = $this->masterPrivilegeRepository->find($id);

        if (empty($masterPrivilege)) {
            Flash::error('Master Privilege not found');

            return redirect(route('masterPrivileges.index'));
        }

        $masterPrivilege = $this->masterPrivilegeRepository->update($request->all(), $id);

        Flash::success('Master Privilege updated successfully.');

        return redirect(route('masterPrivileges.index'));
    }

    /**
     * Remove the specified master_privilege from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterPrivilege = $this->masterPrivilegeRepository->find($id);

        if (empty($masterPrivilege)) {
            Flash::error('Master Privilege not found');

            return redirect(route('masterPrivileges.index'));
        }

        $this->masterPrivilegeRepository->delete($id);

        Flash::success('Master Privilege deleted successfully.');

        return redirect(route('masterPrivileges.index'));
    }
}
