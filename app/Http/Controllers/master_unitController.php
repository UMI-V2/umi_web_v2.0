<?php

namespace App\Http\Controllers;

use App\DataTables\master_unitDataTable;
use App\Http\Requests;
use App\Http\Requests\Createmaster_unitRequest;
use App\Http\Requests\Updatemaster_unitRequest;
use App\Repositories\master_unitRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class master_unitController extends AppBaseController
{
    /** @var master_unitRepository $masterUnitRepository*/
    private $masterUnitRepository;

    public function __construct(master_unitRepository $masterUnitRepo)
    {
        $this->masterUnitRepository = $masterUnitRepo;
    }

    /**
     * Display a listing of the master_unit.
     *
     * @param master_unitDataTable $masterUnitDataTable
     *
     * @return Response
     */
    public function index(master_unitDataTable $masterUnitDataTable)
    {
        return $masterUnitDataTable->render('master_units.index');
    }

    /**
     * Show the form for creating a new master_unit.
     *
     * @return Response
     */
    public function create()
    {
        return view('master_units.create');
    }

    /**
     * Store a newly created master_unit in storage.
     *
     * @param Createmaster_unitRequest $request
     *
     * @return Response
     */
    public function store(Createmaster_unitRequest $request)
    {
        $input = $request->all();

        $masterUnit = $this->masterUnitRepository->create($input);

        Flash::success('Master Unit saved successfully.');

        return redirect(route('masterUnits.index'));
    }

    /**
     * Display the specified master_unit.
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
     * Show the form for editing the specified master_unit.
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
     * Update the specified master_unit in storage.
     *
     * @param int $id
     * @param Updatemaster_unitRequest $request
     *
     * @return Response
     */
    public function update($id, Updatemaster_unitRequest $request)
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
     * Remove the specified master_unit from storage.
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
