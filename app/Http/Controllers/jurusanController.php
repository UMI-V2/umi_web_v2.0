<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatejurusanRequest;
use App\Http\Requests\UpdatejurusanRequest;
use App\Repositories\jurusanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class jurusanController extends AppBaseController
{
    /** @var jurusanRepository $jurusanRepository*/
    private $jurusanRepository;

    public function __construct(jurusanRepository $jurusanRepo)
    {
        $this->jurusanRepository = $jurusanRepo;
    }

    /**
     * Display a listing of the jurusan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $jurusans = $this->jurusanRepository->paginate(10);

        return view('jurusans.index')
            ->with('jurusans', $jurusans);
    }

    /**
     * Show the form for creating a new jurusan.
     *
     * @return Response
     */
    public function create()
    {
        return view('jurusans.create');
    }

    /**
     * Store a newly created jurusan in storage.
     *
     * @param CreatejurusanRequest $request
     *
     * @return Response
     */
    public function store(CreatejurusanRequest $request)
    {
        $input = $request->all();

        $jurusan = $this->jurusanRepository->create($input);

        Flash::success('Jurusan saved successfully.');

        return redirect(route('jurusans.index'));
    }

    /**
     * Display the specified jurusan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jurusan = $this->jurusanRepository->find($id);

        if (empty($jurusan)) {
            Flash::error('Jurusan not found');

            return redirect(route('jurusans.index'));
        }

        return view('jurusans.show')->with('jurusan', $jurusan);
    }

    /**
     * Show the form for editing the specified jurusan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jurusan = $this->jurusanRepository->find($id);

        if (empty($jurusan)) {
            Flash::error('Jurusan not found');

            return redirect(route('jurusans.index'));
        }

        return view('jurusans.edit')->with('jurusan', $jurusan);
    }

    /**
     * Update the specified jurusan in storage.
     *
     * @param int $id
     * @param UpdatejurusanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatejurusanRequest $request)
    {
        $jurusan = $this->jurusanRepository->find($id);

        if (empty($jurusan)) {
            Flash::error('Jurusan not found');

            return redirect(route('jurusans.index'));
        }

        $jurusan = $this->jurusanRepository->update($request->all(), $id);

        Flash::success('Jurusan updated successfully.');

        return redirect(route('jurusans.index'));
    }

    /**
     * Remove the specified jurusan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jurusan = $this->jurusanRepository->find($id);

        if (empty($jurusan)) {
            Flash::error('Jurusan not found');

            return redirect(route('jurusans.index'));
        }

        $this->jurusanRepository->delete($id);

        Flash::success('Jurusan deleted successfully.');

        return redirect(route('jurusans.index'));
    }
}
