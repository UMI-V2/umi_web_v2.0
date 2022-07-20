<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Requests;
use App\Models\Business;
use Laracasts\Flash\Flash;
use App\Models\BusinessFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\DataTables\BusinessFileDataTable;
use App\Http\Controllers\AppBaseController;
use App\Repositories\BusinessFileRepository;
use App\Http\Requests\CreateBusinessFileRequest;
use App\Http\Requests\UpdateBusinessFileRequest;

class BusinessFileController extends AppBaseController
{
    /** @var BusinessFileRepository $businessFileRepository*/
    private $businessFileRepository;

    public function __construct(BusinessFileRepository $businessFileRepo)
    {
        $this->businessFileRepository = $businessFileRepo;
    }

    /**
     * Display a listing of the BusinessFile.
     *
     * @param BusinessFileDataTable $businessFileDataTable
     *
     * @return Response
     */
    public function index(BusinessFileDataTable $businessFileDataTable)
    {
        return $businessFileDataTable->render('business_files.index');
    }

    /**
     * Show the form for creating a new BusinessFile.
     *
     * @return Response
     */
    public function create()
    {
        $businesses = Business::all();
        // dd($businesses);
        return view('business_files.create')->with('businesses', $businesses);
    }

    static function uploadOrDeleteFile(Request $request, String $idUsaha)
    {
        try {
            if ($request->add_file_photos) {
                foreach ($request->file('add_file_photos') as $file) {
                    $fileRoot = $file->store("assets/business/$idUsaha/photos", 'public');
                    BusinessFile::create([
                        'id_usaha' => $idUsaha,
                        'file' => $fileRoot,
                        'is_video' => false,
                        'is_photo' => true
                    ]);
                }
            }
    
            if ($request->delete_files) {
                foreach ($request->delete_files as $photo) {
                    BusinessFile::where('file', $photo)->delete();
                    if (Storage::disk('public')->exists($photo)) {
                        Storage::disk('public')->delete($photo);
                    }
                }
            }
        } catch (Exception $e) {
            return ('Gagal Menambah File Usaha Baru');
        }
        
    }
    
    /**
     * Store a newly created BusinessFile in storage.
     *
     * @param CreateBusinessFileRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // $input = $request->all();
        // $businessFile = $this->businessFileRepository->create($input);
        // Flash::success('Business File saved successfully.');
        // return redirect(route('businessFiles.index'));

        //menyimpan produk ke database
        // $input = BusinessFile::create($request->all());
        // dd($request->all());


        $request->all();

        if($request->hasFile('file')){
            foreach ($request->file('file') as $item) {
                $file = $item->store('imageproduct','public');

                BusinessFile::updateOrCreate([
                    'id' => $request->id
                ], [
                    'id_usaha' => $request->id_usaha,
                    'is_video' => $request->is_video == 'on'?1:0,
                    'is_photo' => $request->is_photo == 'on'?1:0,
                    'file' => $file
                ]);
            }
          
            return redirect()->route('businessFiles.index')->with('status','Berhasil Menambah File Usaha Baru');
        }
    }

    /**
     * Display the specified BusinessFile.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $businessFile = $this->businessFileRepository->find($id);

        if (empty($businessFile)) {
            Flash::error('Business File not found');

            return redirect(route('businessFiles.index'));
        }

        return view('business_files.show')->with('businessFile', $businessFile);
    }

    /**
     * Show the form for editing the specified BusinessFile.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $businessFile = $this->businessFileRepository->find($id);
        $businesses = Business::query()->pluck('nama_usaha', 'id');

        if (empty($businessFile)) {
            Flash::error('Business File not found');

            return redirect(route('businessFiles.index'));
        }

        return view('business_files.edit')->with('businessFile', $businessFile)->with('businesses', $businesses);
    }

    /**
     * Update the specified BusinessFile in storage.
     *
     * @param int $id
     * @param UpdateBusinessFileRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBusinessFileRequest $request)
    {
        $businessFile = $this->businessFileRepository->find($id);

        if (empty($businessFile)) {
            Flash::error('Business File not found');

            return redirect(route('businessFiles.index'));
        }

        $businessFile = $this->businessFileRepository->update($request->all(), $id);

        Flash::success('Business File updated successfully.');

        return redirect(route('businessFiles.index'));
    }

    /**
     * Remove the specified BusinessFile from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $businessFile = $this->businessFileRepository->find($id);

        if (empty($businessFile)) {
            Flash::error('Business File not found');

            return redirect(route('businessFiles.index'));
        }

        $this->businessFileRepository->delete($id);

        Flash::success('Business File deleted successfully.');

        return redirect(route('businessFiles.index'));
    }
}
