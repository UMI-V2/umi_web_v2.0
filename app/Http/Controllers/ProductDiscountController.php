<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Discount;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Models\ProductDiscount;
use App\DataTables\ProductDiscountDataTable;
use App\Repositories\ProductDiscountRepository;
use App\Http\Requests\CreateProductDiscountRequest;
use App\Http\Requests\UpdateProductDiscountRequest;

class ProductDiscountController extends Controller
{
    /** @var ProductDiscountRepository $productDiscountRepository*/
    private $productDiscountRepository;

    public function __construct(ProductDiscountRepository $productDiscountRepo)
    {
        $this->productDiscountRepository = $productDiscountRepo;
    }

    /**
     * Display a listing of the DiscountProduct.
     *
     * @param ProductDiscountDataTable $productDiscountDataTable
     *
     * @return Response
     */
    public function index(ProductDiscountDataTable $productDiscountDataTable)
    {
        return $productDiscountDataTable->render('product_discounts.index');
    }

    /**
     * Show the form for creating a new DiscountProduct.
     *
     * @return Response
     */
    public function create()
    {
        $products = Product::query()->pluck('nama', 'id');
        $discounts = Discount::query()->pluck('nama_promo', 'id');
        return view('product_discounts.create')->with('products', $products)->with('discounts', $discounts);
    }

    /**
     * Store a newly created DiscountProduct in storage.
     *
     * @param CreateProductDiscountRequest $request
     *
     * @return Response
     */
    public function store(CreateProductDiscountRequest $request)
    {
        $input = $request->all();

        $productDiscount = $this->productDiscountRepository->create($input);

        Flash::success('Discount Product saved successfully.');

        return redirect(route('productDiscounts.index'));
    }

    /**
     * Display the specified DiscountProduct.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        // $productDiscount = $this->productDiscountRepository->find($id);
        $productDiscount = ProductDiscount::with(['products', 'discounts'])->where('id', $id)->first();

        if (empty($productDiscount)) {
            Flash::error('Discount Product not found');

            return redirect(route('productDiscounts.index'));
        }

        return view('product_discounts.show')->with('productDiscount', $productDiscount);
    }

    /**
     * Show the form for editing the specified DiscountProduct.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productDiscount = $this->productDiscountRepository->find($id);
        $products = Product::query()->pluck('nama', 'id');
        $discounts = Discount::query()->pluck('nama_promo', 'id');

        if (empty($productDiscount)) {
            Flash::error('Discount Product not found');

            return redirect(route('productDiscounts.index'));
        }

        return view('product_discounts.edit')->with('productDiscount', $productDiscount)->with('products', $products)->with('discounts', $discounts);
    }

    /**
     * Update the specified DiscountProduct in storage.
     *
     * @param int $id
     * @param UpdateProductDiscountRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductDiscountRequest $request)
    {
        $productDiscount = $this->productDiscountRepository->find($id);

        if (empty($productDiscount)) {
            Flash::error('Discount Product not found');

            return redirect(route('productDiscounts.index'));
        }

        $productDiscount = $this->productDiscountRepository->update($request->all(), $id);

        Flash::success('Discount Product updated successfully.');

        return redirect(route('productDiscounts.index'));
    }

    /**
     * Remove the specified DiscountProduct from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productDiscount = $this->productDiscountRepository->find($id);

        if (empty($productDiscount)) {
            Flash::error('Discount Product not found');

            return redirect(route('productDiscounts.index'));
        }

        $this->productDiscountRepository->delete($id);

        Flash::success('Discount Product deleted successfully.');

        return redirect(route('productDiscounts.index'));
    }
}
