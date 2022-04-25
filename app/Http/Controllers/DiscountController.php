<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\DataTables\DiscountDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use App\Repositories\DiscountRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DiscountController extends AppBaseController
{
    /** @var DiscountRepository $discountRepository*/
    private $discountRepository;

    public function __construct(DiscountRepository $discountRepo)
    {
        $this->discountRepository = $discountRepo;
    }

    /**
     * Display a listing of the Discount.
     *
     * @param DiscountDataTable $discountDataTable
     *
     * @return Response
     */
    public function index(DiscountDataTable $discountDataTable)
    {
        return $discountDataTable->render('discounts.index');
    }

    /**
     * Show the form for creating a new Discount.
     *
     * @return Response
     */
    public function create()
    {
        $products = Product::query()->pluck('nama', 'id');
        return view('discounts.create')->with('products', $products);
    }

    /**
     * Store a newly created Discount in storage.
     *
     * @param CreateDiscountRequest $request
     *
     * @return Response
     */
    public function store(CreateDiscountRequest $request)
    {
        $input = $request->all();

        $discount = $this->discountRepository->create($input);

        Flash::success('Discount saved successfully.');

        return redirect(route('discounts.index'));
    }

    /**
     * Display the specified Discount.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $discount = $this->discountRepository->find($id);

        if (empty($discount)) {
            Flash::error('Discount not found');

            return redirect(route('discounts.index'));
        }

        return view('discounts.show')->with('discount', $discount);
    }

    /**
     * Show the form for editing the specified Discount.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $discount = $this->discountRepository->find($id);
        $products = Product::query()->pluck('nama', 'id');

        if (empty($discount)) {
            Flash::error('Discount not found');

            return redirect(route('discounts.index'));
        }

        return view('discounts.edit')->with('discount', $discount)->with('products', $products);
    }

    /**
     * Update the specified Discount in storage.
     *
     * @param int $id
     * @param UpdateDiscountRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDiscountRequest $request)
    {
        $discount = $this->discountRepository->find($id);

        if (empty($discount)) {
            Flash::error('Discount not found');

            return redirect(route('discounts.index'));
        }

        $discount = $this->discountRepository->update($request->all(), $id);

        Flash::success('Discount updated successfully.');

        return redirect(route('discounts.index'));
    }

    /**
     * Remove the specified Discount from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $discount = $this->discountRepository->find($id);

        if (empty($discount)) {
            Flash::error('Discount not found');

            return redirect(route('discounts.index'));
        }

        $this->discountRepository->delete($id);

        Flash::success('Discount deleted successfully.');

        return redirect(route('discounts.index'));
    }
}
