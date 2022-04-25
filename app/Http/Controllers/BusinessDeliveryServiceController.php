<?php

namespace App\Http\Controllers;

use App\Models\MasterDeliveryService;
use App\Models\Business;
use App\DataTables\BusinessDeliveryServiceDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBusinessDeliveryServiceRequest;
use App\Http\Requests\UpdateBusinessDeliveryServiceRequest;
use App\Repositories\BusinessDeliveryServiceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BusinessDeliveryServiceController extends AppBaseController
{
    /** @var BusinessDeliveryServiceRepository $businessDeliveryServiceRepository*/
    private $businessDeliveryServiceRepository;

    public function __construct(BusinessDeliveryServiceRepository $businessDeliveryServiceRepo)
    {
        $this->businessDeliveryServiceRepository = $businessDeliveryServiceRepo;
    }

    /**
     * Display a listing of the BusinessDeliveryService.
     *
     * @param BusinessDeliveryServiceDataTable $businessDeliveryServiceDataTable
     *
     * @return Response
     */
    public function index(BusinessDeliveryServiceDataTable $businessDeliveryServiceDataTable)
    {
        return $businessDeliveryServiceDataTable->render('business_delivery_services.index');
    }

    /**
     * Show the form for creating a new BusinessDeliveryService.
     *
     * @return Response
     */
    public function create()
    {
        $businesses = Business::query()->pluck('nama_usaha', 'id');
        $master_delivery_services = MasterDeliveryService::query()->pluck('nama_jasa_pengiriman', 'id');
        return view('business_delivery_services.create')->with('businesses', $businesses)->with('master_delivery_services', $master_delivery_services);
    }

    /**
     * Store a newly created BusinessDeliveryService in storage.
     *
     * @param CreateBusinessDeliveryServiceRequest $request
     *
     * @return Response
     */
    public function store(CreateBusinessDeliveryServiceRequest $request)
    {
        $input = $request->all();

        $businessDeliveryService = $this->businessDeliveryServiceRepository->create($input);

        Flash::success('Business Delivery Service saved successfully.');

        return redirect(route('businessDeliveryServices.index'));
    }

    /**
     * Display the specified BusinessDeliveryService.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $businessDeliveryService = $this->businessDeliveryServiceRepository->find($id);

        if (empty($businessDeliveryService)) {
            Flash::error('Business Delivery Service not found');

            return redirect(route('businessDeliveryServices.index'));
        }

        return view('business_delivery_services.show')->with('businessDeliveryService', $businessDeliveryService);
    }

    /**
     * Show the form for editing the specified BusinessDeliveryService.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $businessDeliveryService = $this->businessDeliveryServiceRepository->find($id);
        $businesses = Business::query()->pluck('nama_usaha', 'id');
        $master_delivery_services = MasterDeliveryService::query()->pluck('nama_jasa_pengiriman', 'id');

        if (empty($businessDeliveryService)) {
            Flash::error('Business Delivery Service not found');

            return redirect(route('businessDeliveryServices.index'));
        }

        return view('business_delivery_services.edit')->with('businessDeliveryService', $businessDeliveryService)->with('businesses', $businesses)->with('master_delivery_services', $master_delivery_services);
    }

    /**
     * Update the specified BusinessDeliveryService in storage.
     *
     * @param int $id
     * @param UpdateBusinessDeliveryServiceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBusinessDeliveryServiceRequest $request)
    {
        $businessDeliveryService = $this->businessDeliveryServiceRepository->find($id);

        if (empty($businessDeliveryService)) {
            Flash::error('Business Delivery Service not found');

            return redirect(route('businessDeliveryServices.index'));
        }

        $businessDeliveryService = $this->businessDeliveryServiceRepository->update($request->all(), $id);

        Flash::success('Business Delivery Service updated successfully.');

        return redirect(route('businessDeliveryServices.index'));
    }

    /**
     * Remove the specified BusinessDeliveryService from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $businessDeliveryService = $this->businessDeliveryServiceRepository->find($id);

        if (empty($businessDeliveryService)) {
            Flash::error('Business Delivery Service not found');

            return redirect(route('businessDeliveryServices.index'));
        }

        $this->businessDeliveryServiceRepository->delete($id);

        Flash::success('Business Delivery Service deleted successfully.');

        return redirect(route('businessDeliveryServices.index'));
    }
}
