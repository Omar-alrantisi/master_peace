<?php

namespace App\Domains\Lookups\Http\Controllers\Backend;
use App\Domains\Lookups\Http\Requests\CategoryRequest;
use App\Domains\Lookups\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Domains\Lookups\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.lookups.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.lookups.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $this->categoryService->store($request->validated());

        return view('backend.lookups.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * @param Category $category
     * @return mixed
     */
    public function edit(Category $category)
    {
        return view('backend.lookups.category.edit')
            ->withCategory($category);
    }

    /**
     * @param CategoryRequest $request
     * @param $category
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(CategoryRequest $request,$category)
    {
        $this->categoryService->update($category, $request->validated());

        return redirect()->back()->withFlashSuccess(__('The Category was successfully updated'));
    }

    /**
     * @param $category
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function destroy($category)
    {
        $this->categoryService->destroy($category);
        return redirect()->back()->withFlashSuccess(__('The Category was successfully deleted.'));
    }
}
