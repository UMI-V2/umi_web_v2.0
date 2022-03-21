<?php

namespace App\Http\Controllers;

use App\DataTables\MasterBusinessCategoryDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMasterBusinessCategoryRequest;
use App\Http\Requests\UpdateMasterBusinessCategoryRequest;
use App\Repositories\MasterBusinessCategoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MasterBusinessCategoryController extends AppBaseController
{
    /** @var MasterBusinessCategoryRepository $masterBusinessCategoryRepository*/
    private $masterBusinessCategoryRepository;

    public function __construct(MasterBusinessCategoryRepository $masterBusinessCategoryRepo)
    {
        $this->masterBusinessCategoryRepository = $masterBusinessCategoryRepo;
    }

    /**
     * Display a listing of the MasterBusinessCategory.
     *
     * @param MasterBusinessCategoryDataTable $masterBusinessCategoryDataTable
     *
     * @return Response
     */
    public function index(MasterBusinessCategoryDataTable $masterBusinessCategoryDataTable)
    {
        return $masterBusinessCategoryDataTable->render('master_business_categories.index');
    }

    /**
     * Show the form for creating a new MasterBusinessCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('master_business_categories.create');
    }

    /**
     * Store a newly created MasterBusinessCategory in storage.
     *
     * @param CreateMasterBusinessCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterBusinessCategoryRequest $request)
    {
        $input = $request->all();

        $masterBusinessCategory = $this->masterBusinessCategoryRepository->create($input);

        Flash::success('Master Business Category saved successfully.');

        return redirect(route('masterBusinessCategories.index'));
    }

    /**
     * Display the specified MasterBusinessCategory.
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
     * Show the form for editing the specified MasterBusinessCategory.
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
     * Update the specified MasterBusinessCategory in storage.
     *
     * @param int $id
     * @param UpdateMasterBusinessCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterBusinessCategoryRequest $request)
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
     * Remove the specified MasterBusinessCategory from storage.
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
