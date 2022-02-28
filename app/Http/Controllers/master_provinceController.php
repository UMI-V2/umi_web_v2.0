<?php

namespace App\Http\Controllers;

use App\DataTables\master_provinceDataTable;
use App\Http\Requests;
use App\Http\Requests\Createmaster_provinceRequest;
use App\Http\Requests\Updatemaster_provinceRequest;
use App\Repositories\master_provinceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class master_provinceController extends AppBaseController
{
    /** @var master_provinceRepository $masterProvinceRepository*/
    private $masterProvinceRepository;

    public function __construct(master_provinceRepository $masterProvinceRepo)
    {
        $this->masterProvinceRepository = $masterProvinceRepo;
    }

    /**
     * Display a listing of the master_province.
     *
     * @param master_provinceDataTable $masterProvinceDataTable
     *
     * @return Response
     */
    public function index(master_provinceDataTable $masterProvinceDataTable)
    {
        return $masterProvinceDataTable->render('master_provinces.index');
    }

    /**
     * Show the form for creating a new master_province.
     *
     * @return Response
     */
    public function create()
    {
        return view('master_provinces.create');
    }

    /**
     * Store a newly created master_province in storage.
     *
     * @param Createmaster_provinceRequest $request
     *
     * @return Response
     */
    public function store(Createmaster_provinceRequest $request)
    {
        $input = $request->all();

        $masterProvince = $this->masterProvinceRepository->create($input);

        Flash::success('Master Province saved successfully.');

        return redirect(route('masterProvinces.index'));
    }

    /**
     * Display the specified master_province.
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
     * Show the form for editing the specified master_province.
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
     * Update the specified master_province in storage.
     *
     * @param int $id
     * @param Updatemaster_provinceRequest $request
     *
     * @return Response
     */
    public function update($id, Updatemaster_provinceRequest $request)
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
     * Remove the specified master_province from storage.
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
