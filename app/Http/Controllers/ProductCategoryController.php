<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\MasterProductCategory;
use App\DataTables\ProductCategoryDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\Repositories\ProductCategoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ProductCategoryController extends AppBaseController
{
    /** @var ProductCategoryRepository $productCategoryRepository*/
    private $productCategoryRepository;

    public function __construct(ProductCategoryRepository $productCategoryRepo)
    {
        $this->productCategoryRepository = $productCategoryRepo;
    }

    /**
     * Display a listing of the ProductCategory.
     *
     * @param ProductCategoryDataTable $productCategoryDataTable
     *
     * @return Response
     */
    public function index(ProductCategoryDataTable $productCategoryDataTable)
    {
        return $productCategoryDataTable->render('product_categories.index');
    }

    /**
     * Show the form for creating a new ProductCategory.
     *
     * @return Response
     */
    public function create()
    {
        $products = Product::query()->pluck('nama', 'id');
        $master_product_cateories = MasterProductCategory::query()->pluck('nama_kategori_produk', 'id');
        return view('product_categories.create')->with('products', $products)->with('master_product_cateories', $master_product_cateories);
    }

    /**
     * Store a newly created ProductCategory in storage.
     *
     * @param CreateProductCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateProductCategoryRequest $request)
    {
        $input = $request->all();

        $productCategory = $this->productCategoryRepository->create($input);

        Flash::success('Product Category saved successfully.');

        return redirect(route('productCategories.index'));
    }

    /**
     * Display the specified ProductCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productCategory = $this->productCategoryRepository->find($id);

        if (empty($productCategory)) {
            Flash::error('Product Category not found');

            return redirect(route('productCategories.index'));
        }

        return view('product_categories.show')->with('productCategory', $productCategory);
    }

    /**
     * Show the form for editing the specified ProductCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productCategory = $this->productCategoryRepository->find($id);
        $products = Product::query()->pluck('nama', 'id');
        $master_product_cateories = MasterProductCategory::query()->pluck('nama_kategori_produk', 'id');

        if (empty($productCategory)) {
            Flash::error('Product Category not found');

            return redirect(route('productCategories.index'));
        }

        return view('product_categories.edit')->with('productCategory', $productCategory)->with('products', $products)->with('master_product_cateories', $master_product_cateories);
    }

    /**
     * Update the specified ProductCategory in storage.
     *
     * @param int $id
     * @param UpdateProductCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductCategoryRequest $request)
    {
        $productCategory = $this->productCategoryRepository->find($id);

        if (empty($productCategory)) {
            Flash::error('Product Category not found');

            return redirect(route('productCategories.index'));
        }

        $productCategory = $this->productCategoryRepository->update($request->all(), $id);

        Flash::success('Product Category updated successfully.');

        return redirect(route('productCategories.index'));
    }

    /**
     * Remove the specified ProductCategory from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productCategory = $this->productCategoryRepository->find($id);

        if (empty($productCategory)) {
            Flash::error('Product Category not found');

            return redirect(route('productCategories.index'));
        }

        $this->productCategoryRepository->delete($id);

        Flash::success('Product Category deleted successfully.');

        return redirect(route('productCategories.index'));
    }
}
