<?php

namespace App\Domains\Worker\Http\Controllers\Frontend;
use App\Domains\Lookups\Services\CategoryService;
use App\Domains\Lookups\Services\CityService;
use App\Domains\Worker\Http\Requests\WorkerRequest;
use App\Domains\Worker\Models\Worker;
use App\Http\Controllers\Controller;
use App\Domains\Lookups\Models\Category;
use App\Domains\Worker\Services\WorkerService;


class WorkerController extends Controller
{

    protected $workerService;
    protected $cityService;
    protected $categoryService;

    public function __construct(WorkerService $workerService, CityService $cityService, CategoryService $categoryService)
    {
        $this->workerService = $workerService;
        $this->cityService = $cityService;
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = $this->cityService->select(['id','name'])->get();
        $categories = $this->categoryService->select(['id','title'])->get();
        return view('frontend.join-worker')
            ->withCities($cities)
            ->withCategories($categories);;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = $this->cityService->select(['id','name'])->get();
        $categories = $this->categoryService->select(['id','title'])->get();
        return view('frontend.join-worker')
                ->withCities($cities)
                ->withCategories($categories);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkerRequest $request)
    {
        $this->workerService->store($request->validated());
        $categories = $this->categoryService->select(['id','title'])->get();
        $cities = $this->cityService->select(['id','name'])->get();
        return redirect()->back()->with('message','Your request has been sent.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Domains\Worker\Models\Worker worker
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $categories = Category::all();
        $singleWorker = Worker::find($id);
        $singleCategory = Category::find($id);

        return view('frontend.worker', compact('singleWorker','categories','singleCategory'));
    }

    /**
     * @param Worker $worker
     * @return mixed
     */
    public function edit(Worker $worker)
    {
        $cities = $this->cityService->select(['id','name'])->get();
        $categories = $this->categoryService->select(['id','title'])->get();
        return view('backend.worker.edit')
            ->withWorker($worker)
            ->withCities($cities)
            ->withCategories($categories);;
    }

    /**
     * @param WorkerRequest $request
     * @param $worker
     * @return mixed
     */
    public function update(WorkerRequest $request,$worker)
    {
        $this->workerService->update($worker, $request->validated());

        return redirect()->back()->withFlashSuccess(__('The Worker was successfully updated'));
    }

    /**
     * @param $worker
     * @return mixed
     */
    public function destroy($worker)
    {
        $this->workerService->destroy($worker);
        return redirect()->back()->withFlashSuccess(__('The Worker was successfully deleted.'));
    }
}
