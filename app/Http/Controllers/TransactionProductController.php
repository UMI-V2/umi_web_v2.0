<?php

namespace App\Http\Controllers;

use App\Models\SalesTransaction;
use App\Models\Product;
use App\DataTables\TransactionProductDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTransactionProductRequest;
use App\Http\Requests\UpdateTransactionProductRequest;
use App\Repositories\TransactionProductRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TransactionProductController extends AppBaseController
{
    /** @var TransactionProductRepository $transactionProductRepository*/
    private $transactionProductRepository;

    public function __construct(TransactionProductRepository $transactionProductRepo)
    {
        $this->transactionProductRepository = $transactionProductRepo;
    }

    /**
     * Display a listing of the TransactionProduct.
     *
     * @param TransactionProductDataTable $transactionProductDataTable
     *
     * @return Response
     */
    public function index(TransactionProductDataTable $transactionProductDataTable)
    {
        return $transactionProductDataTable->render('transaction_products.index');
    }

    /**
     * Show the form for creating a new TransactionProduct.
     *
     * @return Response
     */
    public function create()
    {
        $sales_transactions = SalesTransaction::query()->pluck('no_pemesanan', 'id');
        $products = Product::query()->pluck('nama', 'id');
        return view('transaction_products.create')->with('sales_transactions', $sales_transactions)->with('products', $products);
    }

    /**
     * Store a newly created TransactionProduct in storage.
     *
     * @param CreateTransactionProductRequest $request
     *
     * @return Response
     */
    public function store(CreateTransactionProductRequest $request)
    {
        $input = $request->all();

        $transactionProduct = $this->transactionProductRepository->create($input);

        Flash::success('Transaction Product saved successfully.');

        return redirect(route('transactionProducts.index'));
    }

    /**
     * Display the specified TransactionProduct.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transactionProduct = $this->transactionProductRepository->find($id);

        if (empty($transactionProduct)) {
            Flash::error('Transaction Product not found');

            return redirect(route('transactionProducts.index'));
        }

        return view('transaction_products.show')->with('transactionProduct', $transactionProduct);
    }

    /**
     * Show the form for editing the specified TransactionProduct.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transactionProduct = $this->transactionProductRepository->find($id);
        $sales_transactions = SalesTransaction::query()->pluck('no_pemesanan', 'id');
        $products = Product::query()->pluck('nama', 'id');

        if (empty($transactionProduct)) {
            Flash::error('Transaction Product not found');

            return redirect(route('transactionProducts.index'));
        }

        return view('transaction_products.edit')->with('transactionProduct', $transactionProduct)->with('sales_transactions', $sales_transactions)->with('products', $products);
    }

    /**
     * Update the specified TransactionProduct in storage.
     *
     * @param int $id
     * @param UpdateTransactionProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransactionProductRequest $request)
    {
        $transactionProduct = $this->transactionProductRepository->find($id);

        if (empty($transactionProduct)) {
            Flash::error('Transaction Product not found');

            return redirect(route('transactionProducts.index'));
        }

        $transactionProduct = $this->transactionProductRepository->update($request->all(), $id);

        Flash::success('Transaction Product updated successfully.');

        return redirect(route('transactionProducts.index'));
    }

    /**
     * Remove the specified TransactionProduct from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $transactionProduct = $this->transactionProductRepository->find($id);

        if (empty($transactionProduct)) {
            Flash::error('Transaction Product not found');

            return redirect(route('transactionProducts.index'));
        }

        $this->transactionProductRepository->delete($id);

        Flash::success('Transaction Product deleted successfully.');

        return redirect(route('transactionProducts.index'));
    }
}
