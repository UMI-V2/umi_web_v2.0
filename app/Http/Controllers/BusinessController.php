<?php

namespace App\Http\Controllers;

use App\Models\MasterStatusBusiness;
use App\Models\User;
use App\DataTables\BusinessDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBusinessRequest;
use App\Http\Requests\UpdateBusinessRequest;
use App\Repositories\BusinessRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BusinessController extends AppBaseController
{
    /** @var BusinessRepository $businessRepository*/
    private $businessRepository;

    public function __construct(BusinessRepository $businessRepo)
    {
        $this->businessRepository = $businessRepo;
    }

    /**
     * Display a listing of the Business.
     *
     * @param BusinessDataTable $businessDataTable
     *
     * @return Response
     */
    public function index(BusinessDataTable $businessDataTable)
    {
        return $businessDataTable->render('businesses.index');
    }

    /**
     * Show the form for creating a new Business.
     *
     * @return Response
     */
    public function create()
    {
        $master_status_businesses = MasterStatusBusiness::query()->pluck('nama_status_usaha', 'id');
        $users = user::query()->pluck('name', 'id');
        return view('businesses.create')->with('master_status_businesses', $master_status_businesses)->with('users', $users);
    }

    /**
     * Store a newly created Business in storage.
     *
     * @param CreateBusinessRequest $request
     *
     * @return Response
     */
    public function store(CreateBusinessRequest $request)
    {
        $input = $request->all();

        $business = $this->businessRepository->create($input);

        Flash::success('Business saved successfully.');

        return redirect(route('businesses.index'));
    }

    /**
     * Display the specified Business.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $business = $this->businessRepository->find($id);
        $users = user::query()->pluck('name', 'id');
        $master_status_businesses = MasterStatusBusiness::query()->pluck('nama_status_usaha', 'id');

        if (empty($business)) {
            Flash::error('Business not found');

            return redirect(route('businesses.index'));
        }

        return view('businesses.show')->with('business', $business)->with('users', $users)->with('master_status_businesses', $master_status_businesses);
    }

    /**
     * Show the form for editing the specified Business.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $business = $this->businessRepository->find($id);
        $users = user::query()->pluck('name', 'id');
        $master_status_businesses = MasterStatusBusiness::query()->pluck('nama_status_usaha', 'id');

        if (empty($business)) {
            Flash::error('Business not found');

            return redirect(route('businesses.index'));
        }

        return view('businesses.edit')->with('business', $business)->with('users', $users)->with('master_status_businesses', $master_status_businesses);
    }

    /**
     * Update the specified Business in storage.
     *
     * @param int $id
     * @param UpdateBusinessRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBusinessRequest $request)
    {
        $business = $this->businessRepository->find($id);

        if (empty($business)) {
            Flash::error('Business not found');

            return redirect(route('businesses.index'));
        }

        $business = $this->businessRepository->update($request->all(), $id);

        Flash::success('Business updated successfully.');

        return redirect(route('businesses.index'));
    }

    /**
     * Remove the specified Business from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $business = $this->businessRepository->find($id);

        if (empty($business)) {
            Flash::error('Business not found');

            return redirect(route('businesses.index'));
        }

        $this->businessRepository->delete($id);

        Flash::success('Business deleted successfully.');

        return redirect(route('businesses.index'));
    }
}
