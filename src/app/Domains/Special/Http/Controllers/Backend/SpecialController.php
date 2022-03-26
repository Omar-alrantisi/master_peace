<?php

namespace App\Domains\Special\Http\Controllers\Backend;

use App\Domains\Special\Http\Requests\SpecialRequest;
use App\Domains\Special\Models\Special;
use App\Domains\Special\Services\SpecialService;
use App\Domains\Worker\Services\WorkerService;

use App\Http\Controllers\Controller;

class SpecialController extends Controller
{

    protected $specialService;
    protected $workerService;


    public function __construct(SpecialService $specialService, WorkerService $workerService)
    {
        $this->workerService = $workerService;
        $this->specialService = $specialService;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.special.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workers = $this->workerService->select(['id','name'])->get();
        return view('backend.special.create')
                ->withWorkers($workers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeS(SpecialRequest  $request)
    {

        $this->specialService->store($request->validated());

        return view('backend.special.index');
    }

    /**
     * @param Special $special
     * @return void
     */
    public function show(Special $special)
    {
        //
    }

    /**
     * @param Special $special
     * @return mixed
     */
    public function edit(Special $special)
    {
        $workers = $this->workerService->select(['id','name'])->get();

        return view('backend.special.edit')
            ->withSpecial($special)
            ->withWorkers($workers);
    }

    /**
     * @param SpecialRequest $request
     * @param $special
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(SpecialRequest $request,$special)
    {
        $this->specialService->update($special, $request->validated());

        return redirect()->back()->withFlashSuccess(__('The Special Worker was successfully updated'));
    }

    /**
     * @param $special
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function destroy($special)
    {
        $this->specialService->destroy($special);
        return redirect()->back()->withFlashSuccess(__('The Special Worker was successfully deleted.'));
    }
}
