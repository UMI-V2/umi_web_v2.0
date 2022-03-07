<?php

namespace App\Http\Controllers;

use App\DataTables\master_status_userDataTable;
use App\Http\Requests;
use App\Http\Requests\Createmaster_status_userRequest;
use App\Http\Requests\Updatemaster_status_userRequest;
use App\Repositories\master_status_userRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class master_status_userController extends AppBaseController
{
    /** @var master_status_userRepository $masterStatusUserRepository*/
    private $masterStatusUserRepository;

    public function __construct(master_status_userRepository $masterStatusUserRepo)
    {
        $this->masterStatusUserRepository = $masterStatusUserRepo;
    }

    /**
     * Display a listing of the master_status_user.
     *
     * @param master_status_userDataTable $masterStatusUserDataTable
     *
     * @return Response
     */
    public function index(master_status_userDataTable $masterStatusUserDataTable)
    {
        return $masterStatusUserDataTable->render('master_status_users.index');
    }

    /**
     * Show the form for creating a new master_status_user.
     *
     * @return Response
     */
    public function create()
    {
        return view('master_status_users.create');
    }

    /**
     * Store a newly created master_status_user in storage.
     *
     * @param Createmaster_status_userRequest $request
     *
     * @return Response
     */
    public function store(Createmaster_status_userRequest $request)
    {
        $input = $request->all();

        $masterStatusUser = $this->masterStatusUserRepository->create($input);

        Flash::success('Master Status User saved successfully.');

        return redirect(route('masterStatusUsers.index'));
    }

    /**
     * Display the specified master_status_user.
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
     * Show the form for editing the specified master_status_user.
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
     * Update the specified master_status_user in storage.
     *
     * @param int $id
     * @param Updatemaster_status_userRequest $request
     *
     * @return Response
     */
    public function update($id, Updatemaster_status_userRequest $request)
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
     * Remove the specified master_status_user from storage.
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
