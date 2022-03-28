<?php

namespace App\Http\Controllers;

use App\DataTables\MasterDeliveryServiceDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMasterDeliveryServiceRequest;
use App\Http\Requests\UpdateMasterDeliveryServiceRequest;
use App\Repositories\MasterDeliveryServiceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MasterDeliveryServiceController extends AppBaseController
{
    /** @var MasterDeliveryServiceRepository $masterDeliveryServiceRepository*/
    private $masterDeliveryServiceRepository;

    public function __construct(MasterDeliveryServiceRepository $masterDeliveryServiceRepo)
    {
        $this->masterDeliveryServiceRepository = $masterDeliveryServiceRepo;
    }

    /**
     * Display a listing of the MasterDeliveryService.
     *
     * @param MasterDeliveryServiceDataTable $masterDeliveryServiceDataTable
     *
     * @return Response
     */
    public function index(MasterDeliveryServiceDataTable $masterDeliveryServiceDataTable)
    {
        return $masterDeliveryServiceDataTable->render('master_delivery_services.index');
    }

    /**
     * Show the form for creating a new MasterDeliveryService.
     *
     * @return Response
     */
    public function create()
    {
        return view('master_delivery_services.create');
    }

    /**
     * Store a newly created MasterDeliveryService in storage.
     *
     * @param CreateMasterDeliveryServiceRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterDeliveryServiceRequest $request)
    {
        $input = $request->all();

        $masterDeliveryService = $this->masterDeliveryServiceRepository->create($input);

        Flash::success('Master Delivery Service saved successfully.');

        return redirect(route('masterDeliveryServices.index'));
    }

    /**
     * Display the specified MasterDeliveryService.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterDeliveryService = $this->masterDeliveryServiceRepository->find($id);

        if (empty($masterDeliveryService)) {
            Flash::error('Master Delivery Service not found');

            return redirect(route('masterDeliveryServices.index'));
        }

        return view('master_delivery_services.show')->with('masterDeliveryService', $masterDeliveryService);
    }

    /**
     * Show the form for editing the specified MasterDeliveryService.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterDeliveryService = $this->masterDeliveryServiceRepository->find($id);

        if (empty($masterDeliveryService)) {
            Flash::error('Master Delivery Service not found');

            return redirect(route('masterDeliveryServices.index'));
        }

        return view('master_delivery_services.edit')->with('masterDeliveryService', $masterDeliveryService);
    }

    /**
     * Update the specified MasterDeliveryService in storage.
     *
     * @param int $id
     * @param UpdateMasterDeliveryServiceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterDeliveryServiceRequest $request)
    {
        $masterDeliveryService = $this->masterDeliveryServiceRepository->find($id);

        if (empty($masterDeliveryService)) {
            Flash::error('Master Delivery Service not found');

            return redirect(route('masterDeliveryServices.index'));
        }

        $masterDeliveryService = $this->masterDeliveryServiceRepository->update($request->all(), $id);

        Flash::success('Master Delivery Service updated successfully.');

        return redirect(route('masterDeliveryServices.index'));
    }

    /**
     * Remove the specified MasterDeliveryService from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterDeliveryService = $this->masterDeliveryServiceRepository->find($id);

        if (empty($masterDeliveryService)) {
            Flash::error('Master Delivery Service not found');

            return redirect(route('masterDeliveryServices.index'));
        }

        $this->masterDeliveryServiceRepository->delete($id);

        Flash::success('Master Delivery Service deleted successfully.');

        return redirect(route('masterDeliveryServices.index'));
    }
}
