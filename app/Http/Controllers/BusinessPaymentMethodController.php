<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\MasterPaymentMethod;
use App\DataTables\BusinessPaymentMethodDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBusinessPaymentMethodRequest;
use App\Http\Requests\UpdateBusinessPaymentMethodRequest;
use App\Repositories\BusinessPaymentMethodRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BusinessPaymentMethodController extends AppBaseController
{
    /** @var BusinessPaymentMethodRepository $businessPaymentMethodRepository*/
    private $businessPaymentMethodRepository;

    public function __construct(BusinessPaymentMethodRepository $businessPaymentMethodRepo)
    {
        $this->businessPaymentMethodRepository = $businessPaymentMethodRepo;
    }

    /**
     * Display a listing of the BusinessPaymentMethod.
     *
     * @param BusinessPaymentMethodDataTable $businessPaymentMethodDataTable
     *
     * @return Response
     */
    public function index(BusinessPaymentMethodDataTable $businessPaymentMethodDataTable)
    {
        return $businessPaymentMethodDataTable->render('business_payment_methods.index');
    }

    /**
     * Show the form for creating a new BusinessPaymentMethod.
     *
     * @return Response
     */
    public function create()
    {
        $businesses = Business::query()->pluck('nama_usaha', 'id');
        $masterPaymentMethods = MasterPaymentMethod::query()->pluck('nama_metode_pembayaran', 'id');
        return view('business_payment_methods.create')->with('businesses', $businesses)->with('masterPaymentMethods', $masterPaymentMethods);
    }

    /**
     * Store a newly created BusinessPaymentMethod in storage.
     *
     * @param CreateBusinessPaymentMethodRequest $request
     *
     * @return Response
     */
    public function store(CreateBusinessPaymentMethodRequest $request)
    {
        $input = $request->all();

        $businessPaymentMethod = $this->businessPaymentMethodRepository->create($input);

        Flash::success('Business Payment Method saved successfully.');

        return redirect(route('businessPaymentMethods.index'));
    }

    /**
     * Display the specified BusinessPaymentMethod.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $businessPaymentMethod = $this->businessPaymentMethodRepository->find($id);

        if (empty($businessPaymentMethod)) {
            Flash::error('Business Payment Method not found');

            return redirect(route('businessPaymentMethods.index'));
        }

        return view('business_payment_methods.show')->with('businessPaymentMethod', $businessPaymentMethod);
    }

    /**
     * Show the form for editing the specified BusinessPaymentMethod.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $businessPaymentMethod = $this->businessPaymentMethodRepository->find($id);
        $businesses = Business::query()->pluck('nama_usaha', 'id');
        $masterPaymentMethods = MasterPaymentMethod::query()->pluck('nama_metode_pembayaran', 'id');

        if (empty($businessPaymentMethod)) {
            Flash::error('Business Payment Method not found');

            return redirect(route('businessPaymentMethods.index'));
        }

        return view('business_payment_methods.edit')->with('businessPaymentMethod', $businessPaymentMethod)->with('businesses', $businesses)->with('masterPaymentMethods', $masterPaymentMethods);
    }

    /**
     * Update the specified BusinessPaymentMethod in storage.
     *
     * @param int $id
     * @param UpdateBusinessPaymentMethodRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBusinessPaymentMethodRequest $request)
    {
        $businessPaymentMethod = $this->businessPaymentMethodRepository->find($id);

        if (empty($businessPaymentMethod)) {
            Flash::error('Business Payment Method not found');

            return redirect(route('businessPaymentMethods.index'));
        }

        $businessPaymentMethod = $this->businessPaymentMethodRepository->update($request->all(), $id);

        Flash::success('Business Payment Method updated successfully.');

        return redirect(route('businessPaymentMethods.index'));
    }

    /**
     * Remove the specified BusinessPaymentMethod from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $businessPaymentMethod = $this->businessPaymentMethodRepository->find($id);

        if (empty($businessPaymentMethod)) {
            Flash::error('Business Payment Method not found');

            return redirect(route('businessPaymentMethods.index'));
        }

        $this->businessPaymentMethodRepository->delete($id);

        Flash::success('Business Payment Method deleted successfully.');

        return redirect(route('businessPaymentMethods.index'));
    }
}
