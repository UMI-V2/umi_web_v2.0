<?php

namespace App\Http\Controllers;

use App\DataTables\MasterPaymentMethodDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMasterPaymentMethodRequest;
use App\Http\Requests\UpdateMasterPaymentMethodRequest;
use App\Repositories\MasterPaymentMethodRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MasterPaymentMethodController extends AppBaseController
{
    /** @var MasterPaymentMethodRepository $masterPaymentMethodRepository*/
    private $masterPaymentMethodRepository;

    public function __construct(MasterPaymentMethodRepository $masterPaymentMethodRepo)
    {
        $this->masterPaymentMethodRepository = $masterPaymentMethodRepo;
    }

    /**
     * Display a listing of the MasterPaymentMethod.
     *
     * @param MasterPaymentMethodDataTable $masterPaymentMethodDataTable
     *
     * @return Response
     */
    public function index(MasterPaymentMethodDataTable $masterPaymentMethodDataTable)
    {
        return $masterPaymentMethodDataTable->render('master_payment_methods.index');
    }

    /**
     * Show the form for creating a new MasterPaymentMethod.
     *
     * @return Response
     */
    public function create()
    {
        return view('master_payment_methods.create');
    }

    /**
     * Store a newly created MasterPaymentMethod in storage.
     *
     * @param CreateMasterPaymentMethodRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterPaymentMethodRequest $request)
    {
        $input = $request->all();

        $masterPaymentMethod = $this->masterPaymentMethodRepository->create($input);

        Flash::success('Master Payment Method saved successfully.');

        return redirect(route('masterPaymentMethods.index'));
    }

    /**
     * Display the specified MasterPaymentMethod.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterPaymentMethod = $this->masterPaymentMethodRepository->find($id);

        if (empty($masterPaymentMethod)) {
            Flash::error('Master Payment Method not found');

            return redirect(route('masterPaymentMethods.index'));
        }

        return view('master_payment_methods.show')->with('masterPaymentMethod', $masterPaymentMethod);
    }

    /**
     * Show the form for editing the specified MasterPaymentMethod.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterPaymentMethod = $this->masterPaymentMethodRepository->find($id);

        if (empty($masterPaymentMethod)) {
            Flash::error('Master Payment Method not found');

            return redirect(route('masterPaymentMethods.index'));
        }

        return view('master_payment_methods.edit')->with('masterPaymentMethod', $masterPaymentMethod);
    }

    /**
     * Update the specified MasterPaymentMethod in storage.
     *
     * @param int $id
     * @param UpdateMasterPaymentMethodRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterPaymentMethodRequest $request)
    {
        $masterPaymentMethod = $this->masterPaymentMethodRepository->find($id);

        if (empty($masterPaymentMethod)) {
            Flash::error('Master Payment Method not found');

            return redirect(route('masterPaymentMethods.index'));
        }

        $masterPaymentMethod = $this->masterPaymentMethodRepository->update($request->all(), $id);

        Flash::success('Master Payment Method updated successfully.');

        return redirect(route('masterPaymentMethods.index'));
    }

    /**
     * Remove the specified MasterPaymentMethod from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterPaymentMethod = $this->masterPaymentMethodRepository->find($id);

        if (empty($masterPaymentMethod)) {
            Flash::error('Master Payment Method not found');

            return redirect(route('masterPaymentMethods.index'));
        }

        $this->masterPaymentMethodRepository->delete($id);

        Flash::success('Master Payment Method deleted successfully.');

        return redirect(route('masterPaymentMethods.index'));
    }
}
