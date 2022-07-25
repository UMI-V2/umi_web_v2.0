<?php

namespace App\Http\Controllers;

use Response;
use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\Models\GeneralFile;
use App\DataTables\AnnouncementDataTable;
use App\Http\Controllers\AppBaseController;
use App\Repositories\AnnouncementRepository;
use App\Http\Requests\CreateAnnouncementRequest;
use App\Http\Requests\UpdateAnnouncementRequest;

class AnnouncementController extends AppBaseController
{
    /** @var AnnouncementRepository $announcementRepository*/
    private $announcementRepository;

    public function __construct(AnnouncementRepository $announcementRepo)
    {
        $this->announcementRepository = $announcementRepo;
    }

    /**
     * Display a listing of the Announcement.
     *
     * @param AnnouncementDataTable $announcementDataTable
     *
     * @return Response
     */
    public function index(AnnouncementDataTable $announcementDataTable)
    {
        return $announcementDataTable->render('announcements.index');
    }

    /**
     * Show the form for creating a new Announcement.
     *
     * @return Response
     */
    public function create()
    {
        return view('announcements.create');
    }

    /**
     * Store a newly created Announcement in storage.
     *
     * @param CreateAnnouncementRequest $request
     *
     * @return Response
     */
    public function store(CreateAnnouncementRequest $request)
    {
        // $input = $request->all();
        // $announcement = $this->announcementRepository->create($input);
        // Flash::success('Announcement saved successfully.');
        // return redirect(route('announcements.index'));

        $input = $request->all();
        $announcement = $this->announcementRepository->create($input);
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $item) {
                $file = $item->store("assets/announcement/$announcement->id/photos", 'public');
                GeneralFile::create([
                    'announcement_id' => $announcement->id,
                    'events_id' => null,
                    'news_id' => null,
                    'feed_id' => null,
                    'is_video' => false,
                    'is_photo' => true,
                    'file' => $file
                ]);
            }
            Flash::success('Berhasil Menambah Pengumuman.');
            return redirect(route('announcements.index'));
        }
    }

    /**
     * Display the specified Announcement.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $announcement = $this->announcementRepository->find($id);

        if (empty($announcement)) {
            Flash::error('Announcement not found');

            return redirect(route('announcements.index'));
        }

        return view('announcements.show')->with('announcement', $announcement);
    }

    /**
     * Show the form for editing the specified Announcement.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $announcement = $this->announcementRepository->find($id);

        if (empty($announcement)) {
            Flash::error('Announcement not found');

            return redirect(route('announcements.index'));
        }

        return view('announcements.edit')->with('announcement', $announcement);
    }

    /**
     * Update the specified Announcement in storage.
     *
     * @param int $id
     * @param UpdateAnnouncementRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnnouncementRequest $request)
    {
        $announcement = $this->announcementRepository->find($id);

        if (empty($announcement)) {
            Flash::error('Announcement not found');

            return redirect(route('announcements.index'));
        }

        $announcement = $this->announcementRepository->update($request->all(), $id);

        Flash::success('Announcement updated successfully.');

        return redirect(route('announcements.index'));
    }

    /**
     * Remove the specified Announcement from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $announcement = $this->announcementRepository->find($id);

        if (empty($announcement)) {
            Flash::error('Announcement not found');

            return redirect(route('announcements.index'));
        }

        $this->announcementRepository->delete($id);

        Flash::success('Announcement deleted successfully.');

        return redirect(route('announcements.index'));
    }
}
