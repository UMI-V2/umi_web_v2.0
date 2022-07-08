<?php

namespace App\Http\Controllers;

use App\DataTables\MasterTransactionCategoryDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMasterTransactionCategoryRequest;
use App\Http\Requests\UpdateMasterTransactionCategoryRequest;
use App\Repositories\MasterTransactionCategoryRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MasterTransactionCategoryController extends AppBaseController
{
    /** @var MasterTransactionCategoryRepository $masterTransactionCategoryRepository*/
    private $masterTransactionCategoryRepository;

    public function __construct(MasterTransactionCategoryRepository $masterTransactionCategoryRepo)
    {
        $this->masterTransactionCategoryRepository = $masterTransactionCategoryRepo;
    }

    /**
     * Display a listing of the MasterTransactionCategory.
     *
     * @param MasterTransactionCategoryDataTable $masterTransactionCategoryDataTable
     *
     * @return Response
     */
    public function index(MasterTransactionCategoryDataTable $masterTransactionCategoryDataTable)
    {
        return $masterTransactionCategoryDataTable->render('master_transaction_categories.index');
    }

    /**
     * Show the form for creating a new MasterTransactionCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('master_transaction_categories.create');
    }

    /**
     * Store a newly created MasterTransactionCategory in storage.
     *
     * @param CreateMasterTransactionCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterTransactionCategoryRequest $request)
    {
        $input = $request->all();

        $masterTransactionCategory = $this->masterTransactionCategoryRepository->create($input);

        Flash::success('Master Transaction Category saved successfully.');

        return redirect(route('masterTransactionCategories.index'));
    }

    /**
     * Display the specified MasterTransactionCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterTransactionCategory = $this->masterTransactionCategoryRepository->find($id);

        if (empty($masterTransactionCategory)) {
            Flash::error('Master Transaction Category not found');

            return redirect(route('masterTransactionCategories.index'));
        }

        return view('master_transaction_categories.show')->with('masterTransactionCategory', $masterTransactionCategory);
    }

    /**
     * Show the form for editing the specified MasterTransactionCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterTransactionCategory = $this->masterTransactionCategoryRepository->find($id);

        if (empty($masterTransactionCategory)) {
            Flash::error('Master Transaction Category not found');

            return redirect(route('masterTransactionCategories.index'));
        }

        return view('master_transaction_categories.edit')->with('masterTransactionCategory', $masterTransactionCategory);
    }

    /**
     * Update the specified MasterTransactionCategory in storage.
     *
     * @param int $id
     * @param UpdateMasterTransactionCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterTransactionCategoryRequest $request)
    {
        $masterTransactionCategory = $this->masterTransactionCategoryRepository->find($id);

        if (empty($masterTransactionCategory)) {
            Flash::error('Master Transaction Category not found');

            return redirect(route('masterTransactionCategories.index'));
        }

        $masterTransactionCategory = $this->masterTransactionCategoryRepository->update($request->all(), $id);

        Flash::success('Master Transaction Category updated successfully.');

        return redirect(route('masterTransactionCategories.index'));
    }

    /**
     * Remove the specified MasterTransactionCategory from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterTransactionCategory = $this->masterTransactionCategoryRepository->find($id);

        if (empty($masterTransactionCategory)) {
            Flash::error('Master Transaction Category not found');

            return redirect(route('masterTransactionCategories.index'));
        }

        $this->masterTransactionCategoryRepository->delete($id);

        Flash::success('Master Transaction Category deleted successfully.');

        return redirect(route('masterTransactionCategories.index'));
    }
}
