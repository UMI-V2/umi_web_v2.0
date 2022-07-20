<?php

namespace App\Http\Controllers;

use App\DataTables\MasterStatusBusinessDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMasterStatusBusinessRequest;
use App\Http\Requests\UpdateMasterStatusBusinessRequest;
use App\Repositories\MasterStatusBusinessRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Business;
use Response;

class MasterStatusBusinessController extends AppBaseController
{
    /** @var MasterStatusBusinessRepository $masterStatusBusinessRepository*/
    private $masterStatusBusinessRepository;

    public function __construct(MasterStatusBusinessRepository $masterStatusBusinessRepo)
    {
        $this->masterStatusBusinessRepository = $masterStatusBusinessRepo;
    }

    /**
     * Display a listing of the MasterStatusBusiness.
     *
     * @param MasterStatusBusinessDataTable $masterStatusBusinessDataTable
     *
     * @return Response
     */
    public function index(MasterStatusBusinessDataTable $masterStatusBusinessDataTable)
    {
        return $masterStatusBusinessDataTable->render('master_status_businesses.index');
    }

    /**
     * Show the form for creating a new MasterStatusBusiness.
     *
     * @return Response
     */
    public function create()
    {
        return view('master_status_businesses.create');
    }

    /**
     * Store a newly created MasterStatusBusiness in storage.
     *
     * @param CreateMasterStatusBusinessRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterStatusBusinessRequest $request)
    {
        $input = $request->all();

        $masterStatusBusiness = $this->masterStatusBusinessRepository->create($input);

        Flash::success('Master Status Business saved successfully.');

        return redirect(route('masterStatusBusinesses.index'));
    }

    /**
     * Display the specified MasterStatusBusiness.
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
     * Show the form for editing the specified MasterStatusBusiness.
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
     * Update the specified MasterStatusBusiness in storage.
     *
     * @param int $id
     * @param UpdateMasterStatusBusinessRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterStatusBusinessRequest $request)
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
     * Remove the specified MasterStatusBusiness from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $businesses = Business::where('id_master_status_usaha', $id)->get();
        if ($businesses->isEmpty()) {


            $masterStatusBusiness = $this->masterStatusBusinessRepository->find($id);

            if (empty($masterStatusBusiness)) {
                Flash::error('Master Status Business not found');

                return redirect(route('masterStatusBusinesses.index'));
            }

            $this->masterStatusBusinessRepository->delete($id);

            Flash::success('Master Status Business deleted successfully.');

            return redirect(route('masterStatusBusinesses.index'));
        } else {
            Flash::warning('Anda tidak dapat menghapus data ini, karena telah digunakan. Anda hanya dapat mengubahnya.');
            return redirect(route('masterStatusBusinesses.index'));
        }
    }
}
