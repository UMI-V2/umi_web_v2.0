<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MasterProvince;
use App\Models\MasterCity;
use App\Models\SubDistrict;
use App\DataTables\AddressDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Repositories\AddressRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AddressController extends AppBaseController
{
    /** @var AddressRepository $addressRepository*/
    private $addressRepository;

    public function __construct(AddressRepository $addressRepo)
    {
        $this->addressRepository = $addressRepo;
    }

    /**
     * Display a listing of the Address.
     *
     * @param AddressDataTable $addressDataTable
     *
     * @return Response
     */
    public function index(AddressDataTable $addressDataTable)
    {
        return $addressDataTable->render('addresses.index');
    }

    /**
     * Show the form for creating a new Address.
     *
     * @return Response
     */
    public function create()
    {
        $users = user::query()->pluck('name', 'id');
        $master_provinces = MasterProvince::query()->pluck('province_name', 'province_id');
        $master_cities = MasterCity::query()->pluck('city_name', 'city_id');
        $sub_districts = SubDistrict::query()->pluck('subdistrict_name', 'subdistrict_id');
        return view('addresses.create')->with('users', $users)->with('master_provinces', $master_provinces)->with('master_cities', $master_cities)->with('sub_districts', $sub_districts);
    }

    /**
     * Store a newly created Address in storage.
     *
     * @param CreateAddressRequest $request
     *
     * @return Response
     */
    public function store(CreateAddressRequest $request)
    {
        $input = $request->all();

        $address = $this->addressRepository->create($input);

        Flash::success('Address saved successfully.');

        return redirect(route('addresses.index'));
    }

    /**
     * Display the specified Address.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $address = $this->addressRepository->find($id);

        if (empty($address)) {
            Flash::error('Address not found');

            return redirect(route('addresses.index'));
        }

        return view('addresses.show')->with('address', $address);
    }

    /**
     * Show the form for editing the specified Address.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $address = $this->addressRepository->find($id);
        // dd($users);
        $users = user::query()->pluck('name', 'id');
        $master_provinces = MasterProvince::query()->pluck('province_name', 'province_id');
        $master_cities = MasterCity::query()->pluck('city_name', 'city_id');
        $sub_districts = SubDistrict::query()->pluck('subdistrict_name', 'subdistrict_id');

        if (empty($address)) {
            Flash::error('Address not found');

            return redirect(route('addresses.index'));
        }

        return view('addresses.edit')->with('address', $address)->with('users', $users)->with('master_provinces', $master_provinces)->with('master_cities', $master_cities)->with('sub_districts', $sub_districts);
    }

    /**
     * Update the specified Address in storage.
     *
     * @param int $id
     * @param UpdateAddressRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAddressRequest $request)
    {
        $address = $this->addressRepository->find($id);

        if (empty($address)) {
            Flash::error('Address not found');

            return redirect(route('addresses.index'));
        }

        $address = $this->addressRepository->update($request->all(), $id);

        Flash::success('Address updated successfully.');

        return redirect(route('addresses.index'));
    }

    /**
     * Remove the specified Address from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $address = $this->addressRepository->find($id);

        if (empty($address)) {
            Flash::error('Address not found');

            return redirect(route('addresses.index'));
        }

        $this->addressRepository->delete($id);

        Flash::success('Address deleted successfully.');

        return redirect(route('addresses.index'));
    }
}
