<?php

namespace App\Http\Controllers;

use Response;
use App\Http\Requests;
use App\Models\Product;
use App\Models\Business;
use App\Models\MasterUnit;
use Laracasts\Flash\Flash;
use App\Models\ProductFile;
use App\DataTables\ProductDataTable;
use App\Repositories\ProductRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends AppBaseController
{
    /** @var ProductRepository $productRepository*/
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the Product.
     *
     * @param ProductDataTable $productDataTable
     *
     * @return Response
     */
    public function index(ProductDataTable $productDataTable)
    {
        return $productDataTable->render('products.index');
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
        // $businesses = Business::query()->pluck('nama_usaha', 'id');
        // $master_units = MasterUnit::query()->pluck('nama_satuan', 'id');

        $businesses = Business::query()->select('nama_usaha', 'id')->get();
        $master_units = MasterUnit::query()->select('nama_satuan', 'id')->get();
        return view('products.create')->with('businesses', $businesses)->with('master_units', $master_units);
    }
    
    public function create_service()
    {
        // $businesses = Business::query()->pluck('nama_usaha', 'id');
        // $master_units = MasterUnit::query()->pluck('nama_satuan', 'id');

        $businesses = Business::query()->select('nama_usaha', 'id')->get();
        $master_units = MasterUnit::query()->select('nama_satuan', 'id')->get();
        return view('products.create_service')->with('businesses', $businesses)->with('master_units', $master_units);
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        // $input = $request->all();
        // $product = $this->productRepository->create($input);
        // Flash::success('Product saved successfully.');
        // return redirect(route('products.index'));

        $input = $request->all();
        $product = $this->productRepository->create($input);
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $item) {
                $file = $item->store("assets/business/$product->id_usaha/products", 'public');
                ProductFile::create([
                    'id_produk' => $product->id,
                    'video' => false,
                    'photo' => true,
                    'file' => $file
                ]);
            }
        }
        return redirect()->route('products.index');
    }

    /**
     * Display the specified Product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        // $product = $this->productRepository->find($id);
        $product = Product::with(['businesses', 'master_units'])->where('id', $id)->first();

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->find($id);
        $businesses = Business::query()->pluck('nama_usaha', 'id');
        $master_units = MasterUnit::query()->pluck('nama_satuan', 'id');

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('products.edit')->with('product', $product)->with('businesses', $businesses)->with('master_units', $master_units);
    }

    /**
     * Update the specified Product in storage.
     *
     * @param int $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $product = $this->productRepository->update($request->all(), $id);

        Flash::success('Product updated successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success('Product deleted successfully.');

        return redirect(route('products.index'));
    }
}
