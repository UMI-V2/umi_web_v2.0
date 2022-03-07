<?php

namespace App\Http\Controllers;

use App\DataTables\master_business_categoryDataTable;
use App\Http\Requests;
use App\Http\Requests\Createmaster_business_categoryRequest;
use App\Http\Requests\Updatemaster_business_categoryRequest;
use App\Repositories\master_business_categoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class master_business_categoryController extends AppBaseController
{
    /** @var master_business_categoryRepository $masterBusinessCategoryRepository*/
    private $masterBusinessCategoryRepository;

    public function __construct(master_business_categoryRepository $masterBusinessCategoryRepo)
    {
        $this->masterBusinessCategoryRepository = $masterBusinessCategoryRepo;
    }

    /**
     * Display a listing of the master_business_category.
     *
     * @param master_business_categoryDataTable $masterBusinessCategoryDataTable
     *
     * @return Response
     */
    public function index(master_business_categoryDataTable $masterBusinessCategoryDataTable)
    {
        return $masterBusinessCategoryDataTable->render('meeeeeeeeeeeeester_business_categories.index');
    }

    /**
     * Show the form for creating a new master_business_category.
     *
     * @return Response
     */
    public function create()
    {
        return view('master_business_categories.create');
    }

    /**
     * Store a newly created master_business_category in storage.
     *
     * @param Createmaster_business_categoryRequest $request
     *
     * @return Response
     */
    public function store(Createmaster_business_categoryRequest $request)
    {
        $input = $request->all();

        $masterBusinessCategory = $this->masterBusinessCategoryRepository->create($input);

        Flash::success('Master Business Category saved successfully.');

        return redirect(route('masterBusinessCategories.index'));
    }

    /**
     * Display the specified master_business_category.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterBusinessCategory = $this->masterBusinessCategoryRepository->find($id);

        if (empty($masterBusinessCategory)) {
            Flash::error('Master Business Category not found');

            return redirect(route('masterBusinessCategories.index'));
        }

        return view('master_business_categories.show')->with('masterBusinessCategory', $masterBusinessCategory);
    }

    /**
     * Show the form for editing the specified master_business_category.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterBusinessCategory = $this->masterBusinessCategoryRepository->find($id);

        if (empty($masterBusinessCategory)) {
            Flash::error('Master Business Category not found');

            return redirect(route('masterBusinessCategories.index'));
        }

        return view('master_business_categories.edit')->with('masterBusinessCategory', $masterBusinessCategory);
    }

    /**
     * Update the specified master_business_category in storage.
     *
     * @param int $id
     * @param Updatemaster_business_categoryRequest $request
     *
     * @return Response
     */
    public function update($id, Updatemaster_business_categoryRequest $request)
    {
        $masterBusinessCategory = $this->masterBusinessCategoryRepository->find($id);

        if (empty($masterBusinessCategory)) {
            Flash::error('Master Business Category not found');

            return redirect(route('masterBusinessCategories.index'));
        }

        $masterBusinessCategory = $this->masterBusinessCategoryRepository->update($request->all(), $id);

        Flash::success('Master Business Category updated successfully.');

        return redirect(route('masterBusinessCategories.index'));
    }

    /**
     * Remove the specified master_business_category from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterBusinessCategory = $this->masterBusinessCategoryRepository->find($id);

        if (empty($masterBusinessCategory)) {
            Flash::error('Master Business Category not found');

            return redirect(route('masterBusinessCategories.index'));
        }

        $this->masterBusinessCategoryRepository->delete($id);

        Flash::success('Master Business Category deleted successfully.');

        return redirect(route('masterBusinessCategories.index'));
    }
}
