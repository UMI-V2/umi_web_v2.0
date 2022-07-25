<?php

namespace App\Http\Controllers;

use Response;
use App\Models\User;
use App\Http\Requests;
use App\Models\Business;
use App\Models\OpenHour;
use Laracasts\Flash\Flash;
use App\Models\BusinessFile;
use App\Models\BusinessCategory;
use App\Models\MasterStatusBusiness;
use App\DataTables\BusinessDataTable;
use App\Models\MasterBusinessCategory;
use App\Repositories\BusinessRepository;
use App\Repositories\OpenHourRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateBusinessRequest;
use App\Http\Requests\UpdateBusinessRequest;

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

    public function allMasterBusinessCategory()
    {
        dd(MasterBusinessCategory::get());
        return MasterBusinessCategory::get();
    }

    /**
     * Show the form for creating a new Business.
     *
     * @return Response
     */
    public function create()
    {
        $master_status_businesses = MasterStatusBusiness::query()->select('nama_status_usaha', 'id')->get();
        $users = user::query()->select('id', 'name')->get();
        $master_business_categories = MasterBusinessCategory::query()->select('nama_kategori_usaha', 'id', 'status_kategori_usaha' )->get();
        // $business_categories = MasterBusinessCategory::query()->select('id', 'name')->get();
        // dd($category);
        // dd($users);
        return view('businesses.create')->with('master_status_businesses', $master_status_businesses)->with('users', $users)->with('master_business_categories', $master_business_categories);
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
        // Flash::success('Business saved successfully.');
        // return redirect(route('businesses.index'));

        $input = $request->all();
        $business = $this->businessRepository->create($input);
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $item) {
                $file = $item->store("assets/business/$business->id/photos", 'public');
                BusinessFile::create([
                    'id_usaha' => $business->id,
                    // 'is_video' => $request->is_video == 'on'?1:0,
                    // 'is_photo' => $request->is_photo == 'on'?1:0,
                    'is_video' => false,
                    'is_photo' => true,
                    'file' => $file
                ]);
            }
        }

        OpenHour::updateOrCreate([
            'id_usaha' => $business->id
        ],[
            'id_usaha' => $business->id,
            'senin_buka' => $request->senin_buka,
            'senin_tutup' => $request->senin_tutup,
            'selasa_buka' => $request->selasa_buka,
            'selasa_tutup' => $request->selasa_tutup,
            'rabu_buka' => $request->rabu_buka,
            'rabu_tutup' => $request->rabu_tutup,
            'kamis_buka' => $request->kamis_buka,
            'kamis_tutup' => $request->kamis_tutup,
            'jumat_buka' => $request->jumat_buka,
            'jumat_tutup' => $request->jumat_tutup,
            'sabtu_buka' => $request->sabtu_buka,
            'sabtu_tutup' => $request->sabtu_tutup,
            'minggu_buka' => $request->minggu_buka,
            'minggu_tutup' => $request->minggu_tutup,
        ]);

        BusinessCategory::updateOrCreate([
            'id' => $request->id,
        ],[
            'id_usaha' => $business->id,
            'id_master_kategori_usaha' => $request->id_master_kategori_usaha,
        ]);
        return redirect()->route('businesses.index'); 
        // return view('businesses.index',  compact('masterCategories'));
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
        $business = Business::with(['users', 'masterStatusBusinesses', 'business_file', 'category', 'master_business_categories'])->where('id', $id)->first();
        $openHour = OpenHour::find($id);
        $businessCategory = BusinessCategory::with(['master_business_categories', 'businesses'])->where('id', $id)->first();
        // $businessCategory = BusinessCategory::find($id);
        // return response()->json([
        //     "data"=>$business
        // ]);

        // dd($business);


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
