<?php

namespace App\Http\Controllers;

use App\DataTables\master_delivery_serviceDataTable;
use App\Http\Requests;
use App\Http\Requests\Createmaster_delivery_serviceRequest;
use App\Http\Requests\Updatemaster_delivery_serviceRequest;
use App\Repositories\master_delivery_serviceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class master_delivery_serviceController extends AppBaseController
{
    /** @var master_delivery_serviceRepository $masterDeliveryServiceRepository*/
    private $masterDeliveryServiceRepository;

    public function __construct(master_delivery_serviceRepository $masterDeliveryServiceRepo)
    {
        $this->masterDeliveryServiceRepository = $masterDeliveryServiceRepo;
    }

    /**
     * Display a listing of the master_delivery_service.
     *
     * @param master_delivery_serviceDataTable $masterDeliveryServiceDataTable
     *
     * @return Response
     */
    public function index(master_delivery_serviceDataTable $masterDeliveryServiceDataTable)
    {
        return $masterDeliveryServiceDataTable->render('master_delivery_services.index');
    }

    /**
     * Show the form for creating a new master_delivery_service.
     *
     * @return Response
     */
    public function create()
    {
        return view('master_delivery_services.create');
    }

    /**
     * Store a newly created master_delivery_service in storage.
     *
     * @param Createmaster_delivery_serviceRequest $request
     *
     * @return Response
     */
    public function store(Createmaster_delivery_serviceRequest $request)
    {
        $input = $request->all();

        $masterDeliveryService = $this->masterDeliveryServiceRepository->create($input);

        Flash::success('Master Delivery Service saved successfully.');

        return redirect(route('masterDeliveryServices.index'));
    }

    /**
     * Display the specified master_delivery_service.
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
     * Show the form for editing the specified master_delivery_service.
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
     * Update the specified master_delivery_service in storage.
     *
     * @param int $id
     * @param Updatemaster_delivery_serviceRequest $request
     *
     * @return Response
     */
    public function update($id, Updatemaster_delivery_serviceRequest $request)
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
     * Remove the specified master_delivery_service from storage.
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
