<?php

namespace App\Http\Controllers;

use App\Models\MasterStatusBusiness;
use App\Models\User;
use App\Models\OpenHour;
use App\Models\Business;
use App\Models\BusinessFile;
use App\Models\BusinessCategory;
use App\DataTables\BusinessDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBusinessRequest;
use App\Http\Requests\UpdateBusinessRequest;
use App\Repositories\BusinessRepository;
use App\Repositories\OpenHourRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BusinessController extends AppBaseController
{
    /** @var BusinessRepository $businessRepository*/
    private $businessRepository;



    public function __construct(BusinessRepository $businessRepo)
    {
        $this->businessRepository = $businessRepo;
    }

    /**
     * Display a listing of the Business.
     *
     * @param BusinessDataTable $businessDataTable
     *
     * @return Response
     */
    public function index(BusinessDataTable $businessDataTable)
    {
        return $businessDataTable->render('businesses.index');
    }

    /**
     * Show the form for creating a new Business.
     *
     * @return Response
     */
    public function create()
    {
        $master_status_businesses = MasterStatusBusiness::query()->pluck('nama_status_usaha', 'id');
        $users = user::query()->pluck('name', 'id');
        return view('businesses.create')->with('master_status_businesses', $master_status_businesses)->with('users', $users);
    }

    /**
     * Store a newly created Business in storage.
     *
     * @param CreateBusinessRequest $request
     *
     * @return Response
     */
    public function store(CreateBusinessRequest $request)
    {
        // $input = $request->all();
        // $business = $this->businessRepository->create($input);
        // Flash::success('Business saved successfully.');
        // return redirect(route('businesses.index'));

        $request->all();

        if($request->hasFile('file')){
            foreach ($request->file('file') as $item) {
                $file = $item->store('imageproduct','public');

                BusinessFile::create([
                    'id_usaha' => $request->id_usaha,
                    'is_video' => $request->is_video == 'on'?1:0,
                    'is_photo' => $request->is_photo == 'on'?1:0,
                    'file' => $file
                ]);
            }
          
            return redirect()->route('business.index')->with('status','Berhasil Menambah Usaha Baru');
        }
    }

    /**
     * Display the specified Business.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {


        // $business = $this->businessRepository->find($id);
        $business = Business::with(['users', 'masterStatusBusinesses', 'business_file'])->where('id', $id)->first();
        $openHour = OpenHour::find($id);
        $businessCategory = BusinessCategory::with(['master_business_categories', 'businesses'])->where('id', $id)->first();
        // return response()->json([
        //     "data"=>$business
        // ]);
        // $businessCategory = BusinessCategory::find($id);


        if (empty($business)) {
            Flash::error('Business not found');

            return redirect(route('businesses.index'));
        }

        return view('businesses.show')->with('openHour', $openHour)->with('business', $business)->with('businessCategory', $businessCategory);
    }

    /**
     * Show the form for editing the specified Business.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $business = $this->businessRepository->find($id);
        $users = user::query()->pluck('name', 'id');
        $master_status_businesses = MasterStatusBusiness::query()->pluck('nama_status_usaha', 'id');

        if (empty($business)) {
            Flash::error('Business not found');

            return redirect(route('businesses.index'));
        }

        return view('businesses.edit')->with('business', $business)->with('users', $users)->with('master_status_businesses', $master_status_businesses);
    }

    /**
     * Update the specified Business in storage.
     *
     * @param int $id
     * @param UpdateBusinessRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBusinessRequest $request)
    {
        $business = $this->businessRepository->find($id);

        if (empty($business)) {
            Flash::error('Business not found');

            return redirect(route('businesses.index'));
        }

        $business = $this->businessRepository->update($request->all(), $id);

        Flash::success('Business updated successfully.');

        return redirect(route('businesses.index'));
    }

    /**
     * Remove the specified Business from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $business = $this->businessRepository->find($id);

        if (empty($business)) {
            Flash::error('Business not found');

            return redirect(route('businesses.index'));
        }

        $this->businessRepository->delete($id);

        Flash::success('Business deleted successfully.');

        return redirect(route('businesses.index'));
    }
}
