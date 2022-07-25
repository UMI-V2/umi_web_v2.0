<?php

namespace App\Http\Controllers;

use Response;
use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\Models\GeneralFile;
use App\DataTables\EventDataTable;
use App\Repositories\EventRepository;
use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Http\Controllers\AppBaseController;

class EventController extends AppBaseController
{
    /** @var EventRepository $eventRepository*/
    private $eventRepository;

    public function __construct(EventRepository $eventRepo)
    {
        $this->eventRepository = $eventRepo;
    }

    /**
     * Display a listing of the Event.
     *
     * @param EventDataTable $eventDataTable
     *
     * @return Response
     */
    public function index(EventDataTable $eventDataTable)
    {
        return $eventDataTable->render('events.index');
    }

    /**
     * Show the form for creating a new Event.
     *
     * @return Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created Event in storage.
     *
     * @param CreateEventRequest $request
     *
     * @return Response
     */
    public function store(CreateEventRequest $request)
    {
        // $input = $request->all();
        // $event = $this->eventRepository->create($input);
        // Flash::success('Event saved successfully.');
        // return redirect(route('events.index'));

        $input = $request->all();
        $event = $this->eventRepository->create($input);
        // dd($event->id);

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $item) {
                $file = $item->store("assets/event/$event->id/photos", 'public');

                GeneralFile::create([
                    'events_id' => $event->id,
                    'news_id' => null,
                    'announcement_id' => null,
                    'feed_id' => null,
                    // 'is_video' => $request->is_video == 'on' ? 1 : 0,
                    // 'is_photo' => $request->is_photo == 'on' ? 1 : 0,
                    'is_video' => false,
                    'is_photo' => true,
                    'file' => $file
                ]);
            }

            return redirect(route('events.index'))->with('status', 'Berhasil Menambah Usaha Baru');
            // return redirect()->route('events.index')->with('status', 'Berhasil Menambah Usaha Baru');
        }
    }

    /**
     * Display the specified Event.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $event = $this->eventRepository->find($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        return view('events.show')->with('event', $event);
    }

    /**
     * Show the form for editing the specified Event.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $event = $this->eventRepository->find($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        return view('events.edit')->with('event', $event);
    }

    /**
     * Update the specified Event in storage.
     *
     * @param int $id
     * @param UpdateEventRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventRequest $request)
    {
        $event = $this->eventRepository->find($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        $event = $this->eventRepository->update($request->all(), $id);

        Flash::success('Event updated successfully.');

        return redirect(route('events.index'));
    }

    /**
     * Remove the specified Event from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $event = $this->eventRepository->find($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        $this->eventRepository->delete($id);

        Flash::success('Event deleted successfully.');

        return redirect(route('events.index'));
    }
}
