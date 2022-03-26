<?php

namespace App\Domains\Lookups\Http\Controllers\Backend;
use App\Domains\Lookups\Http\Requests\PageRequest;
use App\Domains\Lookups\Services\PageService;
use App\Http\Controllers\Controller;
use App\Domains\Lookups\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{

    protected $pageService;

    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.lookups.page.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.lookups.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        $this->pageService->store($request->validated());

        return view('backend.lookups.page.index');
    }

    /**
     * @param Page $page
     * @return void
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * @param Page $page
     * @return mixed
     */
    public function edit(Page $page)
    {
        return view('backend.lookups.page.edit')
            ->withPage($page);
    }

    /**
     * @param PageRequest $request
     * @param $page
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(PageRequest $request,$page)
    {
        $this->pageService->update($page, $request->validated());

        return redirect()->back()->withFlashSuccess(__('The Page was successfully updated'));
    }

    /**
     * @param $page
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function destroy($page)
    {
        $this->pageService->destroy($page);
        return redirect()->back()->withFlashSuccess(__('The Page was successfully deleted.'));
    }
}
