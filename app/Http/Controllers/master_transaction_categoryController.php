<?php

namespace App\Http\Controllers;

use App\DataTables\master_transaction_categoryDataTable;
use App\Http\Requests;
use App\Http\Requests\Createmaster_transaction_categoryRequest;
use App\Http\Requests\Updatemaster_transaction_categoryRequest;
use App\Repositories\master_transaction_categoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class master_transaction_categoryController extends AppBaseController
{
    /** @var master_transaction_categoryRepository $masterTransactionCategoryRepository*/
    private $masterTransactionCategoryRepository;

    public function __construct(master_transaction_categoryRepository $masterTransactionCategoryRepo)
    {
        $this->masterTransactionCategoryRepository = $masterTransactionCategoryRepo;
    }

    /**
     * Display a listing of the master_transaction_category.
     *
     * @param master_transaction_categoryDataTable $masterTransactionCategoryDataTable
     *
     * @return Response
     */
    public function index(master_transaction_categoryDataTable $masterTransactionCategoryDataTable)
    {
        return $masterTransactionCategoryDataTable->render('master_transaction_categories.index');
    }

    /**
     * Show the form for creating a new master_transaction_category.
     *
     * @return Response
     */
    public function create()
    {
        return view('master_transaction_categories.create');
    }

    /**
     * Store a newly created master_transaction_category in storage.
     *
     * @param Createmaster_transaction_categoryRequest $request
     *
     * @return Response
     */
    public function store(Createmaster_transaction_categoryRequest $request)
    {
        $input = $request->all();

        $masterTransactionCategory = $this->masterTransactionCategoryRepository->create($input);

        Flash::success('Master Transaction Category saved successfully.');

        return redirect(route('masterTransactionCategories.index'));
    }

    /**
     * Display the specified master_transaction_category.
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
     * Show the form for editing the specified master_transaction_category.
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
     * Update the specified master_transaction_category in storage.
     *
     * @param int $id
     * @param Updatemaster_transaction_categoryRequest $request
     *
     * @return Response
     */
    public function update($id, Updatemaster_transaction_categoryRequest $request)
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
     * Remove the specified master_transaction_category from storage.
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
