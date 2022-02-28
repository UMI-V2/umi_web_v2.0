<?php

namespace App\Http\Controllers;

use App\DataTables\master_status_businessDataTable;
use App\Http\Requests;
use App\Http\Requests\Createmaster_status_businessRequest;
use App\Http\Requests\Updatemaster_status_businessRequest;
use App\Repositories\master_status_businessRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class master_status_businessController extends AppBaseController
{
    /** @var master_status_businessRepository $masterStatusBusinessRepository*/
    private $masterStatusBusinessRepository;

    public function __construct(master_status_businessRepository $masterStatusBusinessRepo)
    {
        $this->masterStatusBusinessRepository = $masterStatusBusinessRepo;
    }

    /**
     * Display a listing of the master_status_business.
     *
     * @param master_status_businessDataTable $masterStatusBusinessDataTable
     *
     * @return Response
     */
    public function index(master_status_businessDataTable $masterStatusBusinessDataTable)
    {
        return $masterStatusBusinessDataTable->render('master_status_businesses.index');
    }

    /**
     * Show the form for creating a new master_status_business.
     *
     * @return Response
     */
    public function create()
    {
        return view('master_status_businesses.create');
    }

    /**
     * Store a newly created master_status_business in storage.
     *
     * @param Createmaster_status_businessRequest $request
     *
     * @return Response
     */
    public function store(Createmaster_status_businessRequest $request)
    {
        $input = $request->all();

        $masterStatusBusiness = $this->masterStatusBusinessRepository->create($input);

        Flash::success('Master Status Business saved successfully.');

        return redirect(route('masterStatusBusinesses.index'));
    }

    /**
     * Display the specified master_status_business.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterStatusBusiness = $this->masterStatusBusinessRepository->find($id);

        if (empty($masterStatusBusiness)) {
            Flash::error('Master Status Business not found');

            return redirect(route('masterStatusBusinesses.index'));
        }

        return view('master_status_businesses.show')->with('masterStatusBusiness', $masterStatusBusiness);
    }

    /**
     * Show the form for editing the specified master_status_business.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterStatusBusiness = $this->masterStatusBusinessRepository->find($id);

        if (empty($masterStatusBusiness)) {
            Flash::error('Master Status Business not found');

            return redirect(route('masterStatusBusinesses.index'));
        }

        return view('master_status_businesses.edit')->with('masterStatusBusiness', $masterStatusBusiness);
    }

    /**
     * Update the specified master_status_business in storage.
     *
     * @param int $id
     * @param Updatemaster_status_businessRequest $request
     *
     * @return Response
     */
    public function update($id, Updatemaster_status_businessRequest $request)
    {
        $masterStatusBusiness = $this->masterStatusBusinessRepository->find($id);

        if (empty($masterStatusBusiness)) {
            Flash::error('Master Status Business not found');

            return redirect(route('masterStatusBusinesses.index'));
        }

        $masterStatusBusiness = $this->masterStatusBusinessRepository->update($request->all(), $id);

        Flash::success('Master Status Business updated successfully.');

        return redirect(route('masterStatusBusinesses.index'));
    }

    /**
     * Remove the specified master_status_business from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterStatusBusiness = $this->masterStatusBusinessRepository->find($id);

        if (empty($masterStatusBusiness)) {
            Flash::error('Master Status Business not found');

            return redirect(route('masterStatusBusinesses.index'));
        }

        $this->masterStatusBusinessRepository->delete($id);

        Flash::success('Master Status Business deleted successfully.');

        return redirect(route('masterStatusBusinesses.index'));
    }
}
