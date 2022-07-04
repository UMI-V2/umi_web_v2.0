<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Models\User;
use App\Http\Requests;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\AppBaseController;
use App\DataTables\MasterPrivilegeDataTable;
use App\Repositories\MasterPrivilegeRepository;
use App\Http\Requests\CreateMasterPrivilegeRequest;
use App\Http\Requests\UpdateMasterPrivilegeRequest;
use App\Models\Product;

class MasterPrivilegeController extends AppBaseController
{
    /** @var MasterPrivilegeRepository $masterPrivilegeRepository*/
    private $masterPrivilegeRepository;

    public function __construct(MasterPrivilegeRepository $masterPrivilegeRepo)
    {
        $this->masterPrivilegeRepository = $masterPrivilegeRepo;
    }

    /**
     * Display a listing of the MasterPrivilege.
     *
     * @param MasterPrivilegeDataTable $masterPrivilegeDataTable
     *
     * @return Response
     */
    public function index(MasterPrivilegeDataTable $masterPrivilegeDataTable)
    {
        return $masterPrivilegeDataTable->render('master_privileges.index');
    }

    /**
     * Show the form for creating a new MasterPrivilege.
     *
     * @return Response
     */
    public function create()
    {
        return view('master_privileges.create');
    }

    /**
     * Store a newly created MasterPrivilege in storage.
     *
     * @param CreateMasterPrivilegeRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterPrivilegeRequest $request)
    {
        $input = $request->all();

        $masterPrivilege = $this->masterPrivilegeRepository->create($input);

        Flash::success('Master Privilege saved successfully.');

        return redirect(route('masterPrivileges.index'));
    }

    /**
     * Display the specified MasterPrivilege.
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
     * Show the form for editing the specified MasterPrivilege.
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
     * Update the specified MasterPrivilege in storage.
     *
     * @param int $id
     * @param UpdateMasterPrivilegeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterPrivilegeRequest $request)
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
     * Remove the specified MasterPrivilege from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $users = User::where('id_privilege', $id)->get();
        if ($users->isEmpty()) {
            $masterPrivilege = $this->masterPrivilegeRepository->find($id);

            if (empty($masterPrivilege)) {
                Flash::error('Master Privilege not found');

                return redirect(route('masterPrivileges.index'));
            }

            $this->masterPrivilegeRepository->delete($id);

            Flash::success('Master Privilege deleted successfully.');

            return redirect(route('masterPrivileges.index'));
        } else {

            Flash::warning('Anda tidak dapat menghapus data ini, karena telah digunakan. Anda hanya dapat mengubahnya.');
            return redirect(route('masterPrivileges.index'));
        }
    }


    public function checkRelation($id)
    {
        $users = User::where('id_privilege', $id)->get();
        if (empty($users)) {
            return true;
        } else {
            return false;
        }
    }
}
