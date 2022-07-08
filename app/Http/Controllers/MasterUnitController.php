<?php

namespace App\Http\Controllers;

use App\DataTables\MasterUnitDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMasterUnitRequest;
use App\Http\Requests\UpdateMasterUnitRequest;
use App\Repositories\MasterUnitRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MasterUnitController extends AppBaseController
{
    /** @var MasterUnitRepository $masterUnitRepository*/
    private $masterUnitRepository;

    public function __construct(MasterUnitRepository $masterUnitRepo)
    {
        $this->masterUnitRepository = $masterUnitRepo;
    }

    /**
     * Display a listing of the MasterUnit.
     *
     * @param MasterUnitDataTable $masterUnitDataTable
     *
     * @return Response
     */
    public function index(MasterUnitDataTable $masterUnitDataTable)
    {
        return $masterUnitDataTable->render('master_units.index');
    }

    /**
     * Show the form for creating a new MasterUnit.
     *
     * @return Response
     */
    public function create()
    {
        return view('master_units.create');
    }

    /**
     * Store a newly created MasterUnit in storage.
     *
     * @param CreateMasterUnitRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterUnitRequest $request)
    {
        $input = $request->all();

        $masterUnit = $this->masterUnitRepository->create($input);

        Flash::success('Master Unit saved successfully.');

        return redirect(route('masterUnits.index'));
    }

    /**
     * Display the specified MasterUnit.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterUnit = $this->masterUnitRepository->find($id);

        if (empty($masterUnit)) {
            Flash::error('Master Unit not found');

            return redirect(route('masterUnits.index'));
        }

        return view('master_units.show')->with('masterUnit', $masterUnit);
    }

    /**
     * Show the form for editing the specified MasterUnit.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterUnit = $this->masterUnitRepository->find($id);

        if (empty($masterUnit)) {
            Flash::error('Master Unit not found');

            return redirect(route('masterUnits.index'));
        }

        return view('master_units.edit')->with('masterUnit', $masterUnit);
    }

    /**
     * Update the specified MasterUnit in storage.
     *
     * @param int $id
     * @param UpdateMasterUnitRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterUnitRequest $request)
    {
        $masterUnit = $this->masterUnitRepository->find($id);

        if (empty($masterUnit)) {
            Flash::error('Master Unit not found');

            return redirect(route('masterUnits.index'));
        }

        $masterUnit = $this->masterUnitRepository->update($request->all(), $id);

        Flash::success('Master Unit updated successfully.');

        return redirect(route('masterUnits.index'));
    }

    /**
     * Remove the specified MasterUnit from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterUnit = $this->masterUnitRepository->find($id);

        if (empty($masterUnit)) {
            Flash::error('Master Unit not found');

            return redirect(route('masterUnits.index'));
        }

        $this->masterUnitRepository->delete($id);

        Flash::success('Master Unit deleted successfully.');

        return redirect(route('masterUnits.index'));
    }
}
