<?php

namespace App\Http\Controllers;

use App\DataTables\master_product_categoryDataTable;
use App\Http\Requests;
use App\Http\Requests\Createmaster_product_categoryRequest;
use App\Http\Requests\Updatemaster_product_categoryRequest;
use App\Repositories\master_product_categoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class master_product_categoryController extends AppBaseController
{
    /** @var master_product_categoryRepository $masterProductCategoryRepository*/
    private $masterProductCategoryRepository;

    public function __construct(master_product_categoryRepository $masterProductCategoryRepo)
    {
        $this->masterProductCategoryRepository = $masterProductCategoryRepo;
    }

    /**
     * Display a listing of the master_product_category.
     *
     * @param master_product_categoryDataTable $masterProductCategoryDataTable
     *
     * @return Response
     */
    public function index(master_product_categoryDataTable $masterProductCategoryDataTable)
    {
        return $masterProductCategoryDataTable->render('master_product_categories.index');
    }

    /**
     * Show the form for creating a new master_product_category.
     *
     * @return Response
     */
    public function create()
    {
        return view('master_product_categories.create');
    }

    /**
     * Store a newly created master_product_category in storage.
     *
     * @param Createmaster_product_categoryRequest $request
     *
     * @return Response
     */
    public function store(Createmaster_product_categoryRequest $request)
    {
        $input = $request->all();

        $masterProductCategory = $this->masterProductCategoryRepository->create($input);

        Flash::success('Master Product Category saved successfully.');

        return redirect(route('masterProductCategories.index'));
    }

    /**
     * Display the specified master_product_category.
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
     * Show the form for editing the specified master_product_category.
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
     * Update the specified master_product_category in storage.
     *
     * @param int $id
     * @param Updatemaster_product_categoryRequest $request
     *
     * @return Response
     */
    public function update($id, Updatemaster_product_categoryRequest $request)
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
     * Remove the specified master_product_category from storage.
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
