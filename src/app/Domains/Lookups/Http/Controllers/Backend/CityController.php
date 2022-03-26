<?php

namespace App\Domains\Lookups\Http\Controllers\Backend;
use App\Domains\Lookups\Http\Requests\CityRequest;
use App\Domains\Lookups\Services\CityService;
use App\Http\Controllers\Controller;
use App\Domains\Lookups\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{

    protected $cityService;

    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.lookups.city.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.lookups.city.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        $this->cityService->store($request->validated());

        return view('backend.lookups.city.index');
    }

    /**
     * @param City $city
     * @return void
     */
    public function show(City $city)
    {
        //
    }

    /**
     * @param City $city
     * @return mixed
     */
    public function edit(City $city)
    {
        return view('backend.lookups.city.edit')
            ->withCity($city);
    }

    /**
     * @param CityRequest $request
     * @param $city
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(CityRequest $request,$city)
    {
        $this->cityService->update($city, $request->validated());

        return redirect()->back()->withFlashSuccess(__('The City was successfully updated'));
    }

    /**
     * @param $city
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function destroy($city)
    {
        $this->cityService->destroy($city);
        return redirect()->back()->withFlashSuccess(__('The City was successfully deleted.'));
    }
}
