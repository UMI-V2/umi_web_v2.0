<?php

namespace App\Http\Controllers;

use App\DataTables\MasterProductCategoryDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMasterProductCategoryRequest;
use App\Http\Requests\UpdateMasterProductCategoryRequest;
use App\Repositories\MasterProductCategoryRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MasterProductCategoryController extends AppBaseController
{
    /** @var MasterProductCategoryRepository $masterProductCategoryRepository*/
    private $masterProductCategoryRepository;

    public function __construct(MasterProductCategoryRepository $masterProductCategoryRepo)
    {
        $this->masterProductCategoryRepository = $masterProductCategoryRepo;
    }

    /**
     * Display a listing of the MasterProductCategory.
     *
     * @param MasterProductCategoryDataTable $masterProductCategoryDataTable
     *
     * @return Response
     */
    public function index(MasterProductCategoryDataTable $masterProductCategoryDataTable)
    {
        return $masterProductCategoryDataTable->render('master_product_categories.index');
    }

    /**
     * Show the form for creating a new MasterProductCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('master_product_categories.create');
    }

    /**
     * Store a newly created MasterProductCategory in storage.
     *
     * @param CreateMasterProductCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterProductCategoryRequest $request)
    {
        $input = $request->all();

        $masterProductCategory = $this->masterProductCategoryRepository->create($input);

        Flash::success('Master Product Category saved successfully.');

        return redirect(route('masterProductCategories.index'));
    }

    /**
     * Display the specified MasterProductCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterProductCategory = $this->masterProductCategoryRepository->find($id);

        if (empty($masterProductCategory)) {
            Flash::error('Master Product Category not found');

            return redirect(route('masterProductCategories.index'));
        }

        return view('master_product_categories.show')->with('masterProductCategory', $masterProductCategory);
    }

    /**
     * Show the form for editing the specified MasterProductCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterProductCategory = $this->masterProductCategoryRepository->find($id);

        if (empty($masterProductCategory)) {
            Flash::error('Master Product Category not found');

            return redirect(route('masterProductCategories.index'));
        }

        return view('master_product_categories.edit')->with('masterProductCategory', $masterProductCategory);
    }

    /**
     * Update the specified MasterProductCategory in storage.
     *
     * @param int $id
     * @param UpdateMasterProductCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterProductCategoryRequest $request)
    {
        $masterProductCategory = $this->masterProductCategoryRepository->find($id);

        if (empty($masterProductCategory)) {
            Flash::error('Master Product Category not found');

            return redirect(route('masterProductCategories.index'));
        }

        $masterProductCategory = $this->masterProductCategoryRepository->update($request->all(), $id);

        Flash::success('Master Product Category updated successfully.');

        return redirect(route('masterProductCategories.index'));
    }

    /**
     * Remove the specified MasterProductCategory from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterProductCategory = $this->masterProductCategoryRepository->find($id);

        if (empty($masterProductCategory)) {
            Flash::error('Master Product Category not found');

            return redirect(route('masterProductCategories.index'));
        }

        $this->masterProductCategoryRepository->delete($id);

        Flash::success('Master Product Category deleted successfully.');

        return redirect(route('masterProductCategories.index'));
    }
}
