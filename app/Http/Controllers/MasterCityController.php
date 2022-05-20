<?php

namespace App\Http\Controllers;

use App\Models\MasterProvince;
use App\DataTables\MasterCityDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMasterCityRequest;
use App\Http\Requests\UpdateMasterCityRequest;
use App\Repositories\MasterCityRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MasterCityController extends AppBaseController
{
    /** @var MasterCityRepository $MasterCityRepository*/
    private $MasterCityRepository;

    public function __construct(MasterCityRepository $masterCityRepo)
    {
        $this->MasterCityRepository = $masterCityRepo;
    }

    /**
     * Display a listing of the MasterCity.
     *
     * @param MasterCityDataTable $MasterCityDataTable
     *
     * @return Response
     */
    public function index(MasterCityDataTable $MasterCityDataTable)
    {
        return $MasterCityDataTable->render('master_cities.index');
    }

    /**
     * Show the form for creating a new MasterCity.
     *
     * @return Response
     */
    public function create()
    {
        $master_provinces = MasterProvince::query()->pluck('province_name', 'province_id');
        return view('master_cities.create')->with('master_provinces', $master_provinces);
    }

    /**
     * Store a newly created MasterCity in storage.
     *
     * @param CreateMasterCityRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterCityRequest $request)
    {
        $input = $request->all();

        // dd($input);
        $master_cities = $this->MasterCityRepository->create($input);

        Flash::success('MasterCity saved successfully.');

        return redirect(route('master_cities.index'));
    }

    /**
     * Display the specified MasterCity.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterCity = $this->MasterCityRepository->find($id);

        if (empty($masterCity)) {
            Flash::error('MasterCity not found');

            return redirect(route('master_cities.index'));
        }

        return view('master_cities.show')->with('city', $masterCity);
    }

    /**
     * Show the form for editing the specified MasterCity.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterCity = $this->MasterCityRepository->find($id);
        $master_provinces = MasterProvince::query()->pluck('province_name', 'province_id');

        if (empty($masterCity)) {
            Flash::error('MasterCity not found');

            return redirect(route('master_cities.index'));
        }

        return view('master_cities.edit')->with('city', $masterCity)->with('master_provinces', $master_provinces);
    }

    /**
     * Update the specified MasterCity in storage.
     *
     * @param int $id
     * @param UpdateCityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCityRequest $request)
    {
        $masterCity = $this->MasterCityRepository->find($id);

        if (empty($masterCity)) {
            Flash::error('MasterCity not found');

            return redirect(route('master_cities.index'));
        }

        $masterCity = $this->MasterCityRepository->update($request->all(), $id);

        Flash::success('MasterCity updated successfully.');

        return redirect(route('master_cities.index'));
    }

    /**
     * Remove the specified MasterCity from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterCity = $this->MasterCityRepository->find($id);

        if (empty($masterCity)) {
            Flash::error('MasterCity not found');

            return redirect(route('master_cities.index'));
        }

        $this->MasterCityRepository->delete($id);

        Flash::success('MasterCity deleted successfully.');

        return redirect(route('master_cities.index'));
    }
}
