<?php

namespace App\Http\Controllers;

use App\DataTables\MasterStatusUserDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMasterStatusUserRequest;
use App\Http\Requests\UpdateMasterStatusUserRequest;
use App\Repositories\MasterStatusUserRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MasterStatusUserController extends AppBaseController
{
    /** @var MasterStatusUserRepository $masterStatusUserRepository*/
    private $masterStatusUserRepository;

    public function __construct(MasterStatusUserRepository $masterStatusUserRepo)
    {
        $this->masterStatusUserRepository = $masterStatusUserRepo;
    }

    /**
     * Display a listing of the MasterStatusUser.
     *
     * @param MasterStatusUserDataTable $masterStatusUserDataTable
     *
     * @return Response
     */
    public function index(MasterStatusUserDataTable $masterStatusUserDataTable)
    {
        return $masterStatusUserDataTable->render('master_status_users.index');
    }

    /**
     * Show the form for creating a new MasterStatusUser.
     *
     * @return Response
     */
    public function create()
    {
        return view('master_status_users.create');
    }

    /**
     * Store a newly created MasterStatusUser in storage.
     *
     * @param CreateMasterStatusUserRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterStatusUserRequest $request)
    {
        $input = $request->all();

        $masterStatusUser = $this->masterStatusUserRepository->create($input);

        Flash::success('Master Status User saved successfully.');

        return redirect(route('masterStatusUsers.index'));
    }

    /**
     * Display the specified MasterStatusUser.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterStatusUser = $this->masterStatusUserRepository->find($id);

        if (empty($masterStatusUser)) {
            Flash::error('Master Status User not found');

            return redirect(route('masterStatusUsers.index'));
        }

        return view('master_status_users.show')->with('masterStatusUser', $masterStatusUser);
    }

    /**
     * Show the form for editing the specified MasterStatusUser.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterStatusUser = $this->masterStatusUserRepository->find($id);

        if (empty($masterStatusUser)) {
            Flash::error('Master Status User not found');

            return redirect(route('masterStatusUsers.index'));
        }

        return view('master_status_users.edit')->with('masterStatusUser', $masterStatusUser);
    }

    /**
     * Update the specified MasterStatusUser in storage.
     *
     * @param int $id
     * @param UpdateMasterStatusUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterStatusUserRequest $request)
    {
        $masterStatusUser = $this->masterStatusUserRepository->find($id);

        if (empty($masterStatusUser)) {
            Flash::error('Master Status User not found');

            return redirect(route('masterStatusUsers.index'));
        }

        $masterStatusUser = $this->masterStatusUserRepository->update($request->all(), $id);

        Flash::success('Master Status User updated successfully.');

        return redirect(route('masterStatusUsers.index'));
    }

    /**
     * Remove the specified MasterStatusUser from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterStatusUser = $this->masterStatusUserRepository->find($id);

        if (empty($masterStatusUser)) {
            Flash::error('Master Status User not found');

            return redirect(route('masterStatusUsers.index'));
        }

        $this->masterStatusUserRepository->delete($id);

        Flash::success('Master Status User deleted successfully.');

        return redirect(route('masterStatusUsers.index'));
    }
}
