<?php

namespace App\Http\Controllers;

use App\Models\ShippingCostVariable;
use App\Models\BusinessDeliveryService;
use App\DataTables\ShippingUsedDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateShippingUsedRequest;
use App\Http\Requests\UpdateShippingUsedRequest;
use App\Repositories\ShippingUsedRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ShippingUsedController extends AppBaseController
{
    /** @var ShippingUsedRepository $shippingUsedRepository*/
    private $shippingUsedRepository;

    public function __construct(ShippingUsedRepository $shippingUsedRepo)
    {
        $this->shippingUsedRepository = $shippingUsedRepo;
    }

    /**
     * Display a listing of the ShippingUsed.
     *
     * @param ShippingUsedDataTable $shippingUsedDataTable
     *
     * @return Response
     */
    public function index(ShippingUsedDataTable $shippingUsedDataTable)
    {
        return $shippingUsedDataTable->render('shipping_useds.index');
    }

    /**
     * Show the form for creating a new ShippingUsed.
     *
     * @return Response
     */
    public function create()
    {
        $shipping_cost_variables = ShippingCostVariable::query()->pluck('is_paid_by_seller', 'id');
        $business_delivery_services = BusinessDeliveryService::query()->pluck('biaya', 'id');
        return view('shipping_useds.create', compact('shipping_cost_variables', 'business_delivery_services'));
    }

    /**
     * Store a newly created ShippingUsed in storage.
     *
     * @param CreateShippingUsedRequest $request
     *
     * @return Response
     */
    public function store(CreateShippingUsedRequest $request)
    {
        $input = $request->all();

        $shippingUsed = $this->shippingUsedRepository->create($input);

        Flash::success('Shipping Used saved successfully.');

        return redirect(route('shippingUseds.index'));
    }

    /**
     * Display the specified ShippingUsed.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shippingUsed = $this->shippingUsedRepository->find($id);

        if (empty($shippingUsed)) {
            Flash::error('Shipping Used not found');

            return redirect(route('shippingUseds.index'));
        }

        return view('shipping_useds.show')->with('shippingUsed', $shippingUsed);
    }

    /**
     * Show the form for editing the specified ShippingUsed.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shippingUsed = $this->shippingUsedRepository->find($id);
        $shipping_cost_variables = ShippingCostVariable::query()->pluck('is_paid_by_seller', 'id');
        $business_delivery_services = BusinessDeliveryService::query()->pluck('biaya', 'id');

        if (empty($shippingUsed)) {
            Flash::error('Shipping Used not found');

            return redirect(route('shippingUseds.index'));
        }

        return view('shipping_useds.edit', compact('shipping_cost_variables', 'business_delivery_services'))->with('shippingUsed', $shippingUsed);
    }

    /**
     * Update the specified ShippingUsed in storage.
     *
     * @param int $id
     * @param UpdateShippingUsedRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateShippingUsedRequest $request)
    {
        $shippingUsed = $this->shippingUsedRepository->find($id);

        if (empty($shippingUsed)) {
            Flash::error('Shipping Used not found');

            return redirect(route('shippingUseds.index'));
        }

        $shippingUsed = $this->shippingUsedRepository->update($request->all(), $id);

        Flash::success('Shipping Used updated successfully.');

        return redirect(route('shippingUseds.index'));
    }

    /**
     * Remove the specified ShippingUsed from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shippingUsed = $this->shippingUsedRepository->find($id);

        if (empty($shippingUsed)) {
            Flash::error('Shipping Used not found');

            return redirect(route('shippingUseds.index'));
        }

        $this->shippingUsedRepository->delete($id);

        Flash::success('Shipping Used deleted successfully.');

        return redirect(route('shippingUseds.index'));
    }
}
