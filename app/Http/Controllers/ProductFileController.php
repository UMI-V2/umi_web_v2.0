<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\DataTables\ProductFileDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateProductFileRequest;
use App\Http\Requests\UpdateProductFileRequest;
use App\Repositories\ProductFileRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ProductFileController extends AppBaseController
{
    /** @var ProductFileRepository $productFileRepository*/
    private $productFileRepository;

    public function __construct(ProductFileRepository $productFileRepo)
    {
        $this->productFileRepository = $productFileRepo;
    }

    /**
     * Display a listing of the ProductFile.
     *
     * @param ProductFileDataTable $productFileDataTable
     *
     * @return Response
     */
    public function index(ProductFileDataTable $productFileDataTable)
    {
        return $productFileDataTable->render('product_files.index');
    }

    /**
     * Show the form for creating a new ProductFile.
     *
     * @return Response
     */
    public function create()
    {
        $products = Product::query()->pluck('nama', 'id');
        return view('product_files.create')->with('products', $products);
    }

    /**
     * Store a newly created ProductFile in storage.
     *
     * @param CreateProductFileRequest $request
     *
     * @return Response
     */
    public function store(CreateProductFileRequest $request)
    {
        $input = $request->all();

        $productFile = $this->productFileRepository->create($input);

        Flash::success('Product File saved successfully.');

        return redirect(route('productFiles.index'));
    }

    /**
     * Display the specified ProductFile.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productFile = $this->productFileRepository->find($id);

        if (empty($productFile)) {
            Flash::error('Product File not found');

            return redirect(route('productFiles.index'));
        }

        return view('product_files.show')->with('productFile', $productFile);
    }

    /**
     * Show the form for editing the specified ProductFile.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productFile = $this->productFileRepository->find($id);
        $products = Product::query()->pluck('nama', 'id');

        if (empty($productFile)) {
            Flash::error('Product File not found');

            return redirect(route('productFiles.index'));
        }

        return view('product_files.edit')->with('productFile', $productFile)->with('products', $products);
    }

    /**
     * Update the specified ProductFile in storage.
     *
     * @param int $id
     * @param UpdateProductFileRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductFileRequest $request)
    {
        $productFile = $this->productFileRepository->find($id);

        if (empty($productFile)) {
            Flash::error('Product File not found');

            return redirect(route('productFiles.index'));
        }

        $productFile = $this->productFileRepository->update($request->all(), $id);

        Flash::success('Product File updated successfully.');

        return redirect(route('productFiles.index'));
    }

    /**
     * Remove the specified ProductFile from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productFile = $this->productFileRepository->find($id);

        if (empty($productFile)) {
            Flash::error('Product File not found');

            return redirect(route('productFiles.index'));
        }

        $this->productFileRepository->delete($id);

        Flash::success('Product File deleted successfully.');

        return redirect(route('productFiles.index'));
    }
}
