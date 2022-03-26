<?php
namespace App\Domains\Lookups\Http\Controllers\Backend;
use App\Domains\Lookups\Models\Category;
use App\Domains\Lookups\Services\CategoryService;
use App\Domains\Lookups\Services\ProductService;
use App\Domains\Lookups\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use App\Domains\Lookups\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $productService;
    protected $categoryService;


    public function __construct(ProductService $productService,CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('backend.lookups.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //$categories=Category::select('id','title')->get();
        $categories = $this->categoryService->select(['id','title'])->get();
        return view('backend.lookups.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $this->productService->store($request->validated());
        return view('backend.lookups.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories=Category::all();
        return view('backend.lookups.product.edit',compact('categories'))
          ->  withProduct($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $product)
    {
        $this->productService->update($product, $request->validated());

        return redirect()->back()->withFlashSuccess(__('The Product was successfully updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        $this->productService->destroy($product);
        return redirect()->back()->withFlashSuccess(__('The Product was successfully deleted.'));
    }
}
