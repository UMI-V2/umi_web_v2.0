<?php

namespace App\Http\Controllers;

use App\Models\SalesTransaction;
use App\DataTables\TransactionStatusDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTransactionStatusRequest;
use App\Http\Requests\UpdateTransactionStatusRequest;
use App\Repositories\TransactionStatusRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TransactionStatusController extends AppBaseController
{
    /** @var TransactionStatusRepository $transactionStatusRepository*/
    private $transactionStatusRepository;

    public function __construct(TransactionStatusRepository $transactionStatusRepo)
    {
        $this->transactionStatusRepository = $transactionStatusRepo;
    }

    /**
     * Display a listing of the TransactionStatus.
     *
     * @param TransactionStatusDataTable $transactionStatusDataTable
     *
     * @return Response
     */
    public function index(TransactionStatusDataTable $transactionStatusDataTable)
    {
        return $transactionStatusDataTable->render('transaction_statuses.index');
    }

    /**
     * Show the form for creating a new TransactionStatus.
     *
     * @return Response
     */
    public function create()
    {
        $sales_transactions = SalesTransaction::query()->pluck('no_pemesanan', 'id');
        return view('transaction_statuses.create')->with('sales_transactions', $sales_transactions);
    }

    /**
     * Store a newly created TransactionStatus in storage.
     *
     * @param CreateTransactionStatusRequest $request
     *
     * @return Response
     */
    public function store(CreateTransactionStatusRequest $request)
    {
        $input = $request->all();

        $transactionStatus = $this->transactionStatusRepository->create($input);

        Flash::success('Transaction Status saved successfully.');

        return redirect(route('transactionStatuses.index'));
    }

    /**
     * Display the specified TransactionStatus.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transactionStatus = $this->transactionStatusRepository->find($id);

        if (empty($transactionStatus)) {
            Flash::error('Transaction Status not found');

            return redirect(route('transactionStatuses.index'));
        }

        return view('transaction_statuses.show')->with('transactionStatus', $transactionStatus);
    }

    /**
     * Show the form for editing the specified TransactionStatus.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transactionStatus = $this->transactionStatusRepository->find($id);
        $sales_transactions = SalesTransaction::query()->pluck('no_pemesanan', 'id');

        if (empty($transactionStatus)) {
            Flash::error('Transaction Status not found');

            return redirect(route('transactionStatuses.index'));
        }

        return view('transaction_statuses.edit')->with('transactionStatus', $transactionStatus)->with('sales_transactions', $sales_transactions);
    }

    /**
     * Update the specified TransactionStatus in storage.
     *
     * @param int $id
     * @param UpdateTransactionStatusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransactionStatusRequest $request)
    {
        $transactionStatus = $this->transactionStatusRepository->find($id);

        if (empty($transactionStatus)) {
            Flash::error('Transaction Status not found');

            return redirect(route('transactionStatuses.index'));
        }

        $transactionStatus = $this->transactionStatusRepository->update($request->all(), $id);

        Flash::success('Transaction Status updated successfully.');

        return redirect(route('transactionStatuses.index'));
    }

    /**
     * Remove the specified TransactionStatus from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $transactionStatus = $this->transactionStatusRepository->find($id);

        if (empty($transactionStatus)) {
            Flash::error('Transaction Status not found');

            return redirect(route('transactionStatuses.index'));
        }

        $this->transactionStatusRepository->delete($id);

        Flash::success('Transaction Status deleted successfully.');

        return redirect(route('transactionStatuses.index'));
    }
}
