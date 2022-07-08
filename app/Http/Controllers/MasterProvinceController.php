<?php

namespace App\Http\Controllers;

use App\DataTables\MasterProvinceDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMasterProvinceRequest;
use App\Http\Requests\UpdateMasterProvinceRequest;
use App\Repositories\MasterProvinceRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MasterProvinceController extends AppBaseController
{
    /** @var MasterProvinceRepository $masterProvinceRepository*/
    private $masterProvinceRepository;

    public function __construct(MasterProvinceRepository $masterProvinceRepo)
    {
        $this->masterProvinceRepository = $masterProvinceRepo;
    }

    /**
     * Display a listing of the MasterProvince.
     *
     * @param MasterProvinceDataTable $masterProvinceDataTable
     *
     * @return Response
     */
    public function index(MasterProvinceDataTable $masterProvinceDataTable)
    {
        return $masterProvinceDataTable->render('master_provinces.index');
    }

    /**
     * Show the form for creating a new MasterProvince.
     *
     * @return Response
     */
    public function create()
    {
        return view('master_provinces.create');
    }

    /**
     * Store a newly created MasterProvince in storage.
     *
     * @param CreateMasterProvinceRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterProvinceRequest $request)
    {
        $input = $request->all();

        $masterProvince = $this->masterProvinceRepository->create($input);

        Flash::success('Master Province saved successfully.');

        return redirect(route('masterProvinces.index'));
    }

    /**
     * Display the specified MasterProvince.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterProvince = $this->masterProvinceRepository->find($id);

        if (empty($masterProvince)) {
            Flash::error('Master Province not found');

            return redirect(route('masterProvinces.index'));
        }

        return view('master_provinces.show')->with('masterProvince', $masterProvince);
    }

    /**
     * Show the form for editing the specified MasterProvince.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterProvince = $this->masterProvinceRepository->find($id);

        if (empty($masterProvince)) {
            Flash::error('Master Province not found');

            return redirect(route('masterProvinces.index'));
        }

        return view('master_provinces.edit')->with('masterProvince', $masterProvince);
    }

    /**
     * Update the specified MasterProvince in storage.
     *
     * @param int $id
     * @param UpdateMasterProvinceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterProvinceRequest $request)
    {
        $masterProvince = $this->masterProvinceRepository->find($id);

        if (empty($masterProvince)) {
            Flash::error('Master Province not found');

            return redirect(route('masterProvinces.index'));
        }

        $masterProvince = $this->masterProvinceRepository->update($request->all(), $id);

        Flash::success('Master Province updated successfully.');

        return redirect(route('masterProvinces.index'));
    }

    /**
     * Remove the specified MasterProvince from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterProvince = $this->masterProvinceRepository->find($id);

        if (empty($masterProvince)) {
            Flash::error('Master Province not found');

            return redirect(route('masterProvinces.index'));
        }

        $this->masterProvinceRepository->delete($id);

        Flash::success('Master Province deleted successfully.');

        return redirect(route('masterProvinces.index'));
    }
}
