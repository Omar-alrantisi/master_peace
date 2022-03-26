<?php

namespace App\Domains\Lookups\Http\Controllers\Frontend;

use App\Domains\Lookups\Models\Category;
use App\Domains\Worker\Models\Worker;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function search(Request $request)
    {

        $categories=Category::all();
        $search = $request->input('search');


        $getWorkers = Worker::whereHas('category', function($categoryQuery) use ($search){
            $categoryQuery->where('name', 'LIKE', '%'.$search.'%' )
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->orWhere('area', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%")
                ->orWhere('price', 'LIKE', "%{$search}%")
                ->orWhere('additional_mobile_number', 'LIKE', "%{$search}%")

            ;
        })->get();


        return view('frontend.search', compact('getWorkers','categories'));
    }

}
