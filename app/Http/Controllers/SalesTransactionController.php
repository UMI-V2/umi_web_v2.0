<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Business;
use App\Models\BusinessPaymentMethod;
use App\Models\SalesDeliveryService;
use App\DataTables\SalesTransactionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSalesTransactionRequest;
use App\Http\Requests\UpdateSalesTransactionRequest;
use App\Repositories\SalesTransactionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SalesTransactionController extends AppBaseController
{
    /** @var SalesTransactionRepository $salesTransactionRepository*/
    private $salesTransactionRepository;

    public function __construct(SalesTransactionRepository $salesTransactionRepo)
    {
        $this->salesTransactionRepository = $salesTransactionRepo;
    }

    /**
     * Display a listing of the SalesTransaction.
     *
     * @param SalesTransactionDataTable $salesTransactionDataTable
     *
     * @return Response
     */
    public function index(SalesTransactionDataTable $salesTransactionDataTable)
    {
        return $salesTransactionDataTable->render('sales_transactions.index');
    }

    /**
     * Show the form for creating a new SalesTransaction.
     *
     * @return Response
     */
    public function create()
    {
        $users = User::query()->pluck('name', 'id');
        $businesses = Business::query()->pluck('nama_usaha', 'id');
        $business_payment_methods = BusinessPaymentMethod::query()->pluck('id_metode_pembayaran', 'id');
        $sales_delivery_services = SalesDeliveryService::query()->pluck('jenis_layanan', 'id');
        return view('sales_transactions.create')->with('users', $users)->with('businesses', $businesses)->with('business_payment_methods', $business_payment_methods)->with('sales_delivery_services', $sales_delivery_services);
    }

    /**
     * Store a newly created SalesTransaction in storage.
     *
     * @param CreateSalesTransactionRequest $request
     *
     * @return Response
     */
    public function store(CreateSalesTransactionRequest $request)
    {
        $input = $request->all();

        $salesTransaction = $this->salesTransactionRepository->create($input);

        Flash::success('Sales Transaction saved successfully.');

        return redirect(route('salesTransactions.index'));
    }

    /**
     * Display the specified SalesTransaction.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $salesTransaction = $this->salesTransactionRepository->find($id);

        if (empty($salesTransaction)) {
            Flash::error('Sales Transaction not found');

            return redirect(route('salesTransactions.index'));
        }

        return view('sales_transactions.show')->with('salesTransaction', $salesTransaction);
    }

    /**
     * Show the form for editing the specified SalesTransaction.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $salesTransaction = $this->salesTransactionRepository->find($id);
        $users = User::query()->pluck('name', 'id');
        $businesses = Business::query()->pluck('nama_usaha', 'id');
        $business_payment_methods = BusinessPaymentMethod::query()->pluck('id_metode_pembayaran', 'id');
        $sales_delivery_services = SalesDeliveryService::query()->pluck('jenis_layanan', 'id');

        if (empty($salesTransaction)) {
            Flash::error('Sales Transaction not found');

            return redirect(route('salesTransactions.index'));
        }

        return view('sales_transactions.edit')->with('salesTransaction', $salesTransaction)->with('users', $users)->with('businesses', $businesses)->with('business_payment_methods', $business_payment_methods)->with('sales_delivery_services', $sales_delivery_services);
    }

    /**
     * Update the specified SalesTransaction in storage.
     *
     * @param int $id
     * @param UpdateSalesTransactionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSalesTransactionRequest $request)
    {
        $salesTransaction = $this->salesTransactionRepository->find($id);

        if (empty($salesTransaction)) {
            Flash::error('Sales Transaction not found');

            return redirect(route('salesTransactions.index'));
        }

        $salesTransaction = $this->salesTransactionRepository->update($request->all(), $id);

        Flash::success('Sales Transaction updated successfully.');

        return redirect(route('salesTransactions.index'));
    }

    /**
     * Remove the specified SalesTransaction from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $salesTransaction = $this->salesTransactionRepository->find($id);

        if (empty($salesTransaction)) {
            Flash::error('Sales Transaction not found');

            return redirect(route('salesTransactions.index'));
        }

        $this->salesTransactionRepository->delete($id);

        Flash::success('Sales Transaction deleted successfully.');

        return redirect(route('salesTransactions.index'));
    }
}
