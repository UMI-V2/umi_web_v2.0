<?php

namespace App\Http\Controllers;

use Response;
use App\Models\User;
use App\Http\Requests;
use App\Models\Business;
use App\Models\MasterBank;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;
use App\DataTables\WithdrawBalanceDataTable;
use App\Repositories\WithdrawBalanceRepository;
use App\Http\Requests\CreateWithdrawBalanceRequest;
use App\Http\Requests\UpdateWithdrawBalanceRequest;

class WithdrawBalanceController extends AppBaseController
{
    /** @var WithdrawBalanceRepository $withdrawBalanceRepository*/
    private $withdrawBalanceRepository;

    public function __construct(WithdrawBalanceRepository $withdrawBalanceRepo)
    {
        $this->withdrawBalanceRepository = $withdrawBalanceRepo;
    }

    /**
     * Display a listing of the WithdrawBalance.
     *
     * @param WithdrawBalanceDataTable $withdrawBalanceDataTable
     *
     * @return Response
     */
    public function index(WithdrawBalanceDataTable $withdrawBalanceDataTable)
    {
        return $withdrawBalanceDataTable->render('withdraw_balances.index');
    }

    /**
     * Show the form for creating a new WithdrawBalance.
     *
     * @return Response
     */
    public function create()
    {
        $users = User::query()->select('id', 'name')->get();
        $businesses = Business::query()->select('id', 'nama_usaha')->get();
        $master_banks = MasterBank::query()->select('id', 'name')->get();
        return view('withdraw_balances.create')->with('users', $users)->with('businesses', $businesses)->with('master_banks', $master_banks);
    }

    /**
     * Store a newly created WithdrawBalance in storage.
     *
     * @param CreateWithdrawBalanceRequest $request
     *
     * @return Response
     */
    public function store(CreateWithdrawBalanceRequest $request)
    {
        $input = $request->all();

        $withdrawBalance = $this->withdrawBalanceRepository->create($input);

        Flash::success('Withdraw Balance saved successfully.');

        return redirect(route('withdrawBalances.index'));
    }

    /**
     * Display the specified WithdrawBalance.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $withdrawBalance = $this->withdrawBalanceRepository->find($id);

        if (empty($withdrawBalance)) {
            Flash::error('Withdraw Balance not found');

            return redirect(route('withdrawBalances.index'));
        }

        return view('withdraw_balances.show')->with('withdrawBalance', $withdrawBalance);
    }

    /**
     * Show the form for editing the specified WithdrawBalance.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $withdrawBalance = $this->withdrawBalanceRepository->find($id);
        $users = user::query()->pluck('name', 'id');
        $businesses = Business::query()->pluck('nama_usaha', 'id');
        $master_banks = MasterBank::query()->pluck('name', 'id');

        if (empty($withdrawBalance)) {
            Flash::error('Withdraw Balance not found');

            return redirect(route('withdrawBalances.index'));
        }

        return view('withdraw_balances.edit')->with('withdrawBalance', $withdrawBalance)->with('users', $users)->with('businesses', $businesses)->with('master_banks', $master_banks);
    }

    /**
     * Update the specified WithdrawBalance in storage.
     *
     * @param int $id
     * @param UpdateWithdrawBalanceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWithdrawBalanceRequest $request)
    {
        $withdrawBalance = $this->withdrawBalanceRepository->find($id);

        if (empty($withdrawBalance)) {
            Flash::error('Withdraw Balance not found');

            return redirect(route('withdrawBalances.index'));
        }

        $withdrawBalance = $this->withdrawBalanceRepository->update($request->all(), $id);

        Flash::success('Withdraw Balance updated successfully.');

        return redirect(route('withdrawBalances.index'));
    }

    /**
     * Remove the specified WithdrawBalance from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $withdrawBalance = $this->withdrawBalanceRepository->find($id);

        if (empty($withdrawBalance)) {
            Flash::error('Withdraw Balance not found');

            return redirect(route('withdrawBalances.index'));
        }

        $this->withdrawBalanceRepository->delete($id);

        Flash::success('Withdraw Balance deleted successfully.');

        return redirect(route('withdrawBalances.index'));
    }
}
