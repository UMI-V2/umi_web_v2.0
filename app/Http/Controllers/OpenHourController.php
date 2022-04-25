<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\DataTables\OpenHourDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOpenHourRequest;
use App\Http\Requests\UpdateOpenHourRequest;
use App\Repositories\OpenHourRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class OpenHourController extends AppBaseController
{
    /** @var OpenHourRepository $openHourRepository*/
    private $openHourRepository;

    public function __construct(OpenHourRepository $openHourRepo)
    {
        $this->openHourRepository = $openHourRepo;
    }

    /**
     * Display a listing of the OpenHour.
     *
     * @param OpenHourDataTable $openHourDataTable
     *
     * @return Response
     */
    public function index(OpenHourDataTable $openHourDataTable)
    {
        return $openHourDataTable->render('open_hours.index');
    }

    /**
     * Show the form for creating a new OpenHour.
     *
     * @return Response
     */
    public function create()
    {
        $businesses = Business::query()->pluck('nama_usaha', 'id');
        return view('open_hours.create')->with('businesses', $businesses);
    }

    /**
     * Store a newly created OpenHour in storage.
     *
     * @param CreateOpenHourRequest $request
     *
     * @return Response
     */
    public function store(CreateOpenHourRequest $request)
    {
        $input = $request->all();

        $openHour = $this->openHourRepository->create($input);

        Flash::success('Open Hour saved successfully.');

        return redirect(route('openHours.index'));
    }

    /**
     * Display the specified OpenHour.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $openHour = $this->openHourRepository->find($id);

        if (empty($openHour)) {
            Flash::error('Open Hour not found');

            return redirect(route('openHours.index'));
        }

        return view('open_hours.show')->with('openHour', $openHour);
    }

    /**
     * Show the form for editing the specified OpenHour.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $openHour = $this->openHourRepository->find($id);
        $businesses = Business::query()->pluck('nama_usaha', 'id');

        if (empty($openHour)) {
            Flash::error('Open Hour not found');

            return redirect(route('openHours.index'));
        }

        return view('open_hours.edit')->with('openHour', $openHour)->with('businesses', $businesses);
    }

    /**
     * Update the specified OpenHour in storage.
     *
     * @param int $id
     * @param UpdateOpenHourRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOpenHourRequest $request)
    {
        $openHour = $this->openHourRepository->find($id);

        if (empty($openHour)) {
            Flash::error('Open Hour not found');

            return redirect(route('openHours.index'));
        }

        $openHour = $this->openHourRepository->update($request->all(), $id);

        Flash::success('Open Hour updated successfully.');

        return redirect(route('openHours.index'));
    }

    /**
     * Remove the specified OpenHour from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $openHour = $this->openHourRepository->find($id);

        if (empty($openHour)) {
            Flash::error('Open Hour not found');

            return redirect(route('openHours.index'));
        }

        $this->openHourRepository->delete($id);

        Flash::success('Open Hour deleted successfully.');

        return redirect(route('openHours.index'));
    }
}
