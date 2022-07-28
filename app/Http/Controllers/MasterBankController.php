<?php

namespace App\Http\Controllers;

use Response;
use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\DataTables\MasterBankDataTable;
use Illuminate\Support\Facades\Validator;
use App\Repositories\MasterBankRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateMasterBankRequest;
use App\Http\Requests\UpdateMasterBankRequest;

class MasterBankController extends AppBaseController
{
    /** @var MasterBankRepository $masterBankRepository*/
    private $masterBankRepository;

    public function __construct(MasterBankRepository $masterBankRepo)
    {
        $this->masterBankRepository = $masterBankRepo;
    }

    /**
     * Display a listing of the MasterBank.
     *
     * @param MasterBankDataTable $masterBankDataTable
     *
     * @return Response
     */
    public function index(MasterBankDataTable $masterBankDataTable)
    {
        return $masterBankDataTable->render('master_banks.index');
    }

    /**
     * Show the form for creating a new MasterBank.
     *
     * @return Response
     */
    public function create()
    {
        return view('master_banks.create');
    }

    /**
     * Store a newly created MasterBank in storage.
     *
     * @param CreateMasterBankRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterBankRequest $request)
    {
        // $input = $request->all();
        // $masterBank = $this->masterBankRepository->create($input);
        // Flash::success('Master Bank saved successfully.');
        // return redirect(route('masterBanks.index'));

        $input = $request->all();
        $masterBank = $this->masterBankRepository->create($input);


        $validator  = Validator::make($request->all(), [
            'logo' => 'required|image'
        ],);
        if ($validator->fails()) {
            Flash::danger('Gambar harus diisi.');
        }
        if ($request->file('logo')) {
            
            $file = $request->logo->store('assets/bank', 'public');     
            // $user = $request->user();
             $masterBank ->logo = $file;
            $masterBank->update();
            // dd($result);
        }

        Flash::success('Master Bank saved successfully.');

        return redirect(route('masterBanks.index'));
    }

    /**
     * Display the specified MasterBank.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterBank = $this->masterBankRepository->find($id);

        if (empty($masterBank)) {
            Flash::error('Master Bank not found');

            return redirect(route('masterBanks.index'));
        }

        return view('master_banks.show')->with('masterBank', $masterBank);
    }

    /**
     * Show the form for editing the specified MasterBank.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterBank = $this->masterBankRepository->find($id);

        if (empty($masterBank)) {
            Flash::error('Master Bank not found');

            return redirect(route('masterBanks.index'));
        }

        return view('master_banks.edit')->with('masterBank', $masterBank);
    }

    /**
     * Update the specified MasterBank in storage.
     *
     * @param int $id
     * @param UpdateMasterBankRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterBankRequest $request)
    {
        $masterBank = $this->masterBankRepository->find($id);

        if (empty($masterBank)) {
            Flash::error('Master Bank not found');

            return redirect(route('masterBanks.index'));
        }

        $masterBank = $this->masterBankRepository->update($request->all(), $id);

        // $validator  = Validator::make($request->all(), [
        //     'logo' => 'required|image'
        // ],);
        // if ($validator->fails()) {
        //     Flash::danger('Gambar harus diisi.');
        // }
        // if ($request->file('logo')) {
            
        //     $file = $request->logo->store('assets/bank', 'public');     
        //      $masterBank ->logo = $file;
        //     $masterBank->update();
        // }

        Flash::success('Master Bank updated successfully.');

        return redirect(route('masterBanks.index'));
    }

    /**
     * Remove the specified MasterBank from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterBank = $this->masterBankRepository->find($id);

        if (empty($masterBank)) {
            Flash::error('Master Bank not found');

            return redirect(route('masterBanks.index'));
        }

        $this->masterBankRepository->delete($id);

        Flash::success('Master Bank deleted successfully.');

        return redirect(route('masterBanks.index'));
    }
}
