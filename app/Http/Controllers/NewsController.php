<?php

namespace App\Http\Controllers;

use Response;
use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\Models\GeneralFile;
use App\DataTables\NewsDataTable;
use App\Repositories\NewsRepository;
use App\Http\Requests\CreateNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Http\Controllers\AppBaseController;

class NewsController extends AppBaseController
{
    /** @var NewsRepository $newsRepository*/
    private $newsRepository;

    public function __construct(NewsRepository $newsRepo)
    {
        $this->newsRepository = $newsRepo;
    }

    /**
     * Display a listing of the News.
     *
     * @param NewsDataTable $newsDataTable
     *
     * @return Response
     */
    public function index(NewsDataTable $newsDataTable)
    {
        return $newsDataTable->render('news.index');
    }

    /**
     * Show the form for creating a new News.
     *
     * @return Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created News in storage.
     *
     * @param CreateNewsRequest $request
     *
     * @return Response
     */
    public function store(CreateNewsRequest $request)
    {
        // $input = $request->all();
        // $news = $this->newsRepository->create($input);
        // Flash::success('News saved successfully.');
        // return redirect(route('news.index'));

        $input = $request->all();
        $news = $this->newsRepository->create($input);
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $item) {
                $file = $item->store("assets/news/$news->id/photos", 'public');
                GeneralFile::create([
                    'news_id' => $news->id,
                    'events_id' => null,
                    'announcement_id' => null,
                    'feed_id' => null,
                    'is_video' => false,
                    'is_photo' => true,
                    'file' => $file
                ]);
            }
            Flash::success('Berhasil Menambah Berita.');
            return redirect(route('news.index'))->with('status', 'Berhasil Menambah Berita Baru');
        }
    }

    /**
     * Display the specified News.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $news = $this->newsRepository->find($id);

        if (empty($news)) {
            Flash::error('News not found');

            return redirect(route('news.index'));
        }

        return view('news.show')->with('news', $news);
    }

    /**
     * Show the form for editing the specified News.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $news = $this->newsRepository->find($id);

        if (empty($news)) {
            Flash::error('News not found');

            return redirect(route('news.index'));
        }

        return view('news.edit')->with('news', $news);
    }

    /**
     * Update the specified News in storage.
     *
     * @param int $id
     * @param UpdateNewsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNewsRequest $request)
    {
        $news = $this->newsRepository->find($id);

        if (empty($news)) {
            Flash::error('News not found');

            return redirect(route('news.index'));
        }

        $news = $this->newsRepository->update($request->all(), $id);

        Flash::success('News updated successfully.');

        return redirect(route('news.index'));
    }

    /**
     * Remove the specified News from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $news = $this->newsRepository->find($id);

        if (empty($news)) {
            Flash::error('News not found');

            return redirect(route('news.index'));
        }

        $this->newsRepository->delete($id);

        Flash::success('News deleted successfully.');

        return redirect(route('news.index'));
    }
}
