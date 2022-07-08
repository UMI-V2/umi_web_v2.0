<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SalesTransaction;
use App\DataTables\RatingDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRatingRequest;
use App\Http\Requests\UpdateRatingRequest;
use App\Repositories\RatingRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class RatingController extends AppBaseController
{
    /** @var RatingRepository $ratingRepository*/
    private $ratingRepository;

    public function __construct(RatingRepository $ratingRepo)
    {
        $this->ratingRepository = $ratingRepo;
    }

    /**
     * Display a listing of the Rating.
     *
     * @param RatingDataTable $ratingDataTable
     *
     * @return Response
     */
    public function index(RatingDataTable $ratingDataTable)
    {
        return $ratingDataTable->render('ratings.index');
    }

    /**
     * Show the form for creating a new Rating.
     *
     * @return Response
     */
    public function create()
    {
        $products = Product::query()->pluck('nama', 'id');
        $sales_transactions = SalesTransaction::query()->pluck('is_rating', 'id');
        return view('ratings.create')->with('products', $products)->with('sales_transactions', $sales_transactions);
    }

    /**
     * Store a newly created Rating in storage.
     *
     * @param CreateRatingRequest $request
     *
     * @return Response
     */
    public function store(CreateRatingRequest $request)
    {
        $input = $request->all();

        $rating = $this->ratingRepository->create($input);

        Flash::success('Rating saved successfully.');

        return redirect(route('ratings.index'));
    }

    /**
     * Display the specified Rating.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rating = $this->ratingRepository->find($id);

        if (empty($rating)) {
            Flash::error('Rating not found');

            return redirect(route('ratings.index'));
        }

        return view('ratings.show')->with('rating', $rating);
    }

    /**
     * Show the form for editing the specified Rating.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rating = $this->ratingRepository->find($id);
        $products = Product::query()->pluck('nama', 'id');
        $sales_transactions = SalesTransaction::query()->pluck('is_rating', 'id');

        if (empty($rating)) {
            Flash::error('Rating not found');

            return redirect(route('ratings.index'));
        }

        return view('ratings.edit')->with('rating', $rating)->with('products', $products)->with('sales_transactions', $sales_transactions);
    }

    /**
     * Update the specified Rating in storage.
     *
     * @param int $id
     * @param UpdateRatingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRatingRequest $request)
    {
        $rating = $this->ratingRepository->find($id);

        if (empty($rating)) {
            Flash::error('Rating not found');

            return redirect(route('ratings.index'));
        }

        $rating = $this->ratingRepository->update($request->all(), $id);

        Flash::success('Rating updated successfully.');

        return redirect(route('ratings.index'));
    }

    /**
     * Remove the specified Rating from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rating = $this->ratingRepository->find($id);

        if (empty($rating)) {
            Flash::error('Rating not found');

            return redirect(route('ratings.index'));
        }

        $this->ratingRepository->delete($id);

        Flash::success('Rating deleted successfully.');

        return redirect(route('ratings.index'));
    }
}
