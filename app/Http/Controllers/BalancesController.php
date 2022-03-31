<?php

namespace App\Http\Controllers;

use App\Models\MasterTransactionCategory;
use App\Models\SalesTransaction;
use App\DataTables\BalancesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBalancesRequest;
use App\Http\Requests\UpdateBalancesRequest;
use App\Repositories\BalancesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BalancesController extends AppBaseController
{
    /** @var BalancesRepository $balancesRepository*/
    private $balancesRepository;

    public function __construct(BalancesRepository $balancesRepo)
    {
        $this->balancesRepository = $balancesRepo;
    }

    /**
     * Display a listing of the Balances.
     *
     * @param BalancesDataTable $balancesDataTable
     *
     * @return Response
     */
    public function index(BalancesDataTable $balancesDataTable)
    {
        return $balancesDataTable->render('balances.index');
    }

    /**
     * Show the form for creating a new Balances.
     *
     * @return Response
     */
    public function create()
    {
        $master_transaction_categories = MasterTransactionCategory::query()->pluck('nama_kategori_transaksi', 'id');
        $sales_transactions = SalesTransaction::query()->pluck('no_pemesanan', 'id');
        return view('balances.create')->with('master_transaction_categories', $master_transaction_categories)->with('sales_transactions', $sales_transactions);
    }

    /**
     * Store a newly created Balances in storage.
     *
     * @param CreateBalancesRequest $request
     *
     * @return Response
     */
    public function store(CreateBalancesRequest $request)
    {
        $input = $request->all();

        $balances = $this->balancesRepository->create($input);

        Flash::success('Balances saved successfully.');

        return redirect(route('balances.index'));
    }

    /**
     * Display the specified Balances.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $balances = $this->balancesRepository->find($id);

        if (empty($balances)) {
            Flash::error('Balances not found');

            return redirect(route('balances.index'));
        }

        return view('balances.show')->with('balances', $balances);
    }

    /**
     * Show the form for editing the specified Balances.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $balances = $this->balancesRepository->find($id);
        $master_transaction_categories = MasterTransactionCategory::query()->pluck('nama_kategori_transaksi', 'id');
        $sales_transactions = SalesTransaction::query()->pluck('no_pemesanan', 'id');

        if (empty($balances)) {
            Flash::error('Balances not found');

            return redirect(route('balances.index'));
        }

        return view('balances.edit')->with('balances', $balances)->with('master_transaction_categories', $master_transaction_categories)->with('sales_transactions', $sales_transactions);
    }

    /**
     * Update the specified Balances in storage.
     *
     * @param int $id
     * @param UpdateBalancesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBalancesRequest $request)
    {
        $balances = $this->balancesRepository->find($id);

        if (empty($balances)) {
            Flash::error('Balances not found');

            return redirect(route('balances.index'));
        }

        $balances = $this->balancesRepository->update($request->all(), $id);

        Flash::success('Balances updated successfully.');

        return redirect(route('balances.index'));
    }

    /**
     * Remove the specified Balances from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $balances = $this->balancesRepository->find($id);

        if (empty($balances)) {
            Flash::error('Balances not found');

            return redirect(route('balances.index'));
        }

        $this->balancesRepository->delete($id);

        Flash::success('Balances deleted successfully.');

        return redirect(route('balances.index'));
    }
}
