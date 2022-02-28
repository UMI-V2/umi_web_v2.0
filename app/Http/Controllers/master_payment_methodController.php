<?php

namespace App\Http\Controllers;

use App\DataTables\master_payment_methodDataTable;
use App\Http\Requests;
use App\Http\Requests\Createmaster_payment_methodRequest;
use App\Http\Requests\Updatemaster_payment_methodRequest;
use App\Repositories\master_payment_methodRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class master_payment_methodController extends AppBaseController
{
    /** @var master_payment_methodRepository $masterPaymentMethodRepository*/
    private $masterPaymentMethodRepository;

    public function __construct(master_payment_methodRepository $masterPaymentMethodRepo)
    {
        $this->masterPaymentMethodRepository = $masterPaymentMethodRepo;
    }

    /**
     * Display a listing of the master_payment_method.
     *
     * @param master_payment_methodDataTable $masterPaymentMethodDataTable
     *
     * @return Response
     */
    public function index(master_payment_methodDataTable $masterPaymentMethodDataTable)
    {
        return $masterPaymentMethodDataTable->render('master_payment_methods.index');
    }

    /**
     * Show the form for creating a new master_payment_method.
     *
     * @return Response
     */
    public function create()
    {
        return view('master_payment_methods.create');
    }

    /**
     * Store a newly created master_payment_method in storage.
     *
     * @param Createmaster_payment_methodRequest $request
     *
     * @return Response
     */
    public function store(Createmaster_payment_methodRequest $request)
    {
        $input = $request->all();

        $masterPaymentMethod = $this->masterPaymentMethodRepository->create($input);

        Flash::success('Master Payment Method saved successfully.');

        return redirect(route('masterPaymentMethods.index'));
    }

    /**
     * Display the specified master_payment_method.
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
     * Show the form for editing the specified master_payment_method.
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
     * Update the specified master_payment_method in storage.
     *
     * @param int $id
     * @param Updatemaster_payment_methodRequest $request
     *
     * @return Response
     */
    public function update($id, Updatemaster_payment_methodRequest $request)
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
     * Remove the specified master_payment_method from storage.
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
