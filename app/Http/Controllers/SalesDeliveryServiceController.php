<?php

namespace App\Http\Controllers;

use App\Models\MasterDeliveryService;
use App\DataTables\SalesDeliveryServiceDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSalesDeliveryServiceRequest;
use App\Http\Requests\UpdateSalesDeliveryServiceRequest;
use App\Repositories\SalesDeliveryServiceRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SalesDeliveryServiceController extends AppBaseController
{
    /** @var SalesDeliveryServiceRepository $salesDeliveryServiceRepository*/
    private $salesDeliveryServiceRepository;

    public function __construct(SalesDeliveryServiceRepository $salesDeliveryServiceRepo)
    {
        $this->salesDeliveryServiceRepository = $salesDeliveryServiceRepo;
    }

    /**
     * Display a listing of the SalesDeliveryService.
     *
     * @param SalesDeliveryServiceDataTable $salesDeliveryServiceDataTable
     *
     * @return Response
     */
    public function index(SalesDeliveryServiceDataTable $salesDeliveryServiceDataTable)
    {
        return $salesDeliveryServiceDataTable->render('sales_delivery_services.index');
    }

    /**
     * Show the form for creating a new SalesDeliveryService.
     *
     * @return Response
     */
    public function create()
    {
        $masterDeliveryServices = MasterDeliveryService::query()->pluck('nama_jasa_pengiriman', 'id');
        return view('sales_delivery_services.create')->with('masterDeliveryServices', $masterDeliveryServices);
    }

    /**
     * Store a newly created SalesDeliveryService in storage.
     *
     * @param CreateSalesDeliveryServiceRequest $request
     *
     * @return Response
     */
    public function store(CreateSalesDeliveryServiceRequest $request)
    {
        $input = $request->all();

        $salesDeliveryService = $this->salesDeliveryServiceRepository->create($input);

        Flash::success('Sales Delivery Service saved successfully.');

        return redirect(route('salesDeliveryServices.index'));
    }

    /**
     * Display the specified SalesDeliveryService.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $salesDeliveryService = $this->salesDeliveryServiceRepository->find($id);

        if (empty($salesDeliveryService)) {
            Flash::error('Sales Delivery Service not found');

            return redirect(route('salesDeliveryServices.index'));
        }

        return view('sales_delivery_services.show')->with('salesDeliveryService', $salesDeliveryService);
    }

    /**
     * Show the form for editing the specified SalesDeliveryService.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $salesDeliveryService = $this->salesDeliveryServiceRepository->find($id);
        $masterDeliveryServices = MasterDeliveryService::query()->pluck('nama_jasa_pengiriman', 'id');

        if (empty($salesDeliveryService)) {
            Flash::error('Sales Delivery Service not found');

            return redirect(route('salesDeliveryServices.index'));
        }

        return view('sales_delivery_services.edit')->with('salesDeliveryService', $salesDeliveryService)->with('masterDeliveryServices', $masterDeliveryServices);
    }

    /**
     * Update the specified SalesDeliveryService in storage.
     *
     * @param int $id
     * @param UpdateSalesDeliveryServiceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSalesDeliveryServiceRequest $request)
    {
        $salesDeliveryService = $this->salesDeliveryServiceRepository->find($id);

        if (empty($salesDeliveryService)) {
            Flash::error('Sales Delivery Service not found');

            return redirect(route('salesDeliveryServices.index'));
        }

        $salesDeliveryService = $this->salesDeliveryServiceRepository->update($request->all(), $id);

        Flash::success('Sales Delivery Service updated successfully.');

        return redirect(route('salesDeliveryServices.index'));
    }

    /**
     * Remove the specified SalesDeliveryService from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $salesDeliveryService = $this->salesDeliveryServiceRepository->find($id);

        if (empty($salesDeliveryService)) {
            Flash::error('Sales Delivery Service not found');

            return redirect(route('salesDeliveryServices.index'));
        }

        $this->salesDeliveryServiceRepository->delete($id);

        Flash::success('Sales Delivery Service deleted successfully.');

        return redirect(route('salesDeliveryServices.index'));
    }
}
