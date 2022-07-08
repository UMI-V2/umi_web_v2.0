<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\BusinessFile;
use App\DataTables\BusinessFileDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBusinessFileRequest;
use App\Http\Requests\UpdateBusinessFileRequest;
use App\Repositories\BusinessFileRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BusinessFileController extends AppBaseController
{
    /** @var BusinessFileRepository $businessFileRepository*/
    private $businessFileRepository;

    public function __construct(BusinessFileRepository $businessFileRepo)
    {
        $this->businessFileRepository = $businessFileRepo;
    }

    /**
     * Display a listing of the BusinessFile.
     *
     * @param BusinessFileDataTable $businessFileDataTable
     *
     * @return Response
     */
    public function index(BusinessFileDataTable $businessFileDataTable)
    {
        return $businessFileDataTable->render('business_files.index');
    }

    /**
     * Show the form for creating a new BusinessFile.
     *
     * @return Response
     */
    public function create()
    {
        $businesses = Business::query()->pluck('nama_usaha', 'id');
        return view('business_files.create')->with('businesses', $businesses);
    }

    /**
     * Store a newly created BusinessFile in storage.
     *
     * @param CreateBusinessFileRequest $request
     *
     * @return Response
     */
    public function store(CreateBusinessFileRequest $request)
    {
        $input = $request->all();

        $businessFile = $this->businessFileRepository->create($input);

        Flash::success('Business File saved successfully.');

        return redirect(route('businessFiles.index'));
    }

    /**
     * Display the specified BusinessFile.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $businessFile = $this->businessFileRepository->find($id);

        if (empty($businessFile)) {
            Flash::error('Business File not found');

            return redirect(route('businessFiles.index'));
        }

        return view('business_files.show')->with('businessFile', $businessFile);
    }

    /**
     * Show the form for editing the specified BusinessFile.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $businessFile = $this->businessFileRepository->find($id);
        $businesses = Business::query()->pluck('nama_usaha', 'id');

        if (empty($businessFile)) {
            Flash::error('Business File not found');

            return redirect(route('businessFiles.index'));
        }

        return view('business_files.edit')->with('businessFile', $businessFile)->with('businesses', $businesses);
    }

    /**
     * Update the specified BusinessFile in storage.
     *
     * @param int $id
     * @param UpdateBusinessFileRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBusinessFileRequest $request)
    {
        $businessFile = $this->businessFileRepository->find($id);

        if (empty($businessFile)) {
            Flash::error('Business File not found');

            return redirect(route('businessFiles.index'));
        }

        $businessFile = $this->businessFileRepository->update($request->all(), $id);

        Flash::success('Business File updated successfully.');

        return redirect(route('businessFiles.index'));
    }

    /**
     * Remove the specified BusinessFile from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $businessFile = $this->businessFileRepository->find($id);

        if (empty($businessFile)) {
            Flash::error('Business File not found');

            return redirect(route('businessFiles.index'));
        }

        $this->businessFileRepository->delete($id);

        Flash::success('Business File deleted successfully.');

        return redirect(route('businessFiles.index'));
    }
}
