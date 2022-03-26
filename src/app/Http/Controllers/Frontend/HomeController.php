<?php

namespace App\Http\Controllers\Frontend;
use App\Domains\Lookups\Models\Category;


/**
 * Class HomeController.
 */
class HomeController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function index()
    {
        $categories =Category::all();

        return view('frontend.index',compact('categories'));
    }
}
