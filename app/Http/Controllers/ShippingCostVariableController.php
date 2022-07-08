<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\DataTables\ShippingCostVariableDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateShippingCostVariableRequest;
use App\Http\Requests\UpdateShippingCostVariableRequest;
use App\Repositories\ShippingCostVariableRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ShippingCostVariableController extends AppBaseController
{
    /** @var ShippingCostVariableRepository $shippingCostVariableRepository*/
    private $shippingCostVariableRepository;

    public function __construct(ShippingCostVariableRepository $shippingCostVariableRepo)
    {
        $this->shippingCostVariableRepository = $shippingCostVariableRepo;
    }

    /**
     * Display a listing of the ShippingCostVariable.
     *
     * @param ShippingCostVariableDataTable $shippingCostVariableDataTable
     *
     * @return Response
     */
    public function index(ShippingCostVariableDataTable $shippingCostVariableDataTable)
    {
        return $shippingCostVariableDataTable->render('shipping_cost_variables.index');
    }

    /**
     * Show the form for creating a new ShippingCostVariable.
     *
     * @return Response
     */
    public function create()
    {
        $products = Product::query()->pluck('nama', 'id');
        return view('shipping_cost_variables.create')->with('products', $products);
    }

    /**
     * Store a newly created ShippingCostVariable in storage.
     *
     * @param CreateShippingCostVariableRequest $request
     *
     * @return Response
     */
    public function store(CreateShippingCostVariableRequest $request)
    {
        $input = $request->all();

        $shippingCostVariable = $this->shippingCostVariableRepository->create($input);

        Flash::success('Shipping Cost Variable saved successfully.');

        return redirect(route('shippingCostVariables.index'));
    }

    /**
     * Display the specified ShippingCostVariable.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shippingCostVariable = $this->shippingCostVariableRepository->find($id);

        if (empty($shippingCostVariable)) {
            Flash::error('Shipping Cost Variable not found');

            return redirect(route('shippingCostVariables.index'));
        }

        return view('shipping_cost_variables.show')->with('shippingCostVariable', $shippingCostVariable);
    }

    /**
     * Show the form for editing the specified ShippingCostVariable.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shippingCostVariable = $this->shippingCostVariableRepository->find($id);
        $products = Product::query()->pluck('nama', 'id');

        if (empty($shippingCostVariable)) {
            Flash::error('Shipping Cost Variable not found');

            return redirect(route('shippingCostVariables.index'));
        }

        return view('shipping_cost_variables.edit')->with('shippingCostVariable', $shippingCostVariable)->with('products', $products);
    }

    /**
     * Update the specified ShippingCostVariable in storage.
     *
     * @param int $id
     * @param UpdateShippingCostVariableRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateShippingCostVariableRequest $request)
    {
        $shippingCostVariable = $this->shippingCostVariableRepository->find($id);

        if (empty($shippingCostVariable)) {
            Flash::error('Shipping Cost Variable not found');

            return redirect(route('shippingCostVariables.index'));
        }

        $shippingCostVariable = $this->shippingCostVariableRepository->update($request->all(), $id);

        Flash::success('Shipping Cost Variable updated successfully.');

        return redirect(route('shippingCostVariables.index'));
    }

    /**
     * Remove the specified ShippingCostVariable from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shippingCostVariable = $this->shippingCostVariableRepository->find($id);

        if (empty($shippingCostVariable)) {
            Flash::error('Shipping Cost Variable not found');

            return redirect(route('shippingCostVariables.index'));
        }

        $this->shippingCostVariableRepository->delete($id);

        Flash::success('Shipping Cost Variable deleted successfully.');

        return redirect(route('shippingCostVariables.index'));
    }
}
