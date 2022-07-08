<?php

namespace App\Http\Controllers;

use Response;
use App\Http\Requests;
use App\Models\Business;
use App\Models\Discount;
use Laracasts\Flash\Flash;
use App\Models\ProductDiscount;
use App\DataTables\DiscountDataTable;
use App\Repositories\DiscountRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;

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
        $businesses = Business::query()->pluck('nama_usaha', 'id');
        return view('discounts.create')->with('businesses', $businesses);
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
        // $discount = $this->discountRepository->find($id);

        $discount = Discount::with([
            'businesses'
        ])->where('id', $id)->first();

        $productDiscount = ProductDiscount::find($id);
        // dd($id);
        // $discount = Discount::where('id', $id)->first();

        // return response()->json([
        //     "data"=>$discount
        // ]);



        if (empty($discount)) {
            Flash::error('Discount not found');

            return redirect(route('discounts.index'));
        }

        return view('discounts.show')->with('discount', $discount)->with('productDiscount', $productDiscount);
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
        $businesses = Business::query()->pluck('nama_usaha', 'id');

        if (empty($discount)) {
            Flash::error('Discount not found');

            return redirect(route('discounts.index'));
        }

        return view('discounts.edit')->with('discount', $discount)->with('businesses', $businesses);
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
