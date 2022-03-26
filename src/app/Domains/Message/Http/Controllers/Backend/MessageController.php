<?php

namespace App\Domains\Message\Http\Controllers\Backend;

use App\Domains\Lookups\Models\Category;
use App\Domains\Message\Http\Requests\MessageRequest;
use App\Http\Controllers\Controller;
use App\Domains\Message\Services\MessageService;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    protected $messageService;


    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.message.index');
    }
    public function create(){
        $categories=Category::all();
        return view('frontend.contact',compact('categories'));
    }
    /**
     * @param MessageRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(MessageRequest $request)
    {
        $this->messageService->store($request->validated());

        return redirect()->back()->with('message','Your message has been sent.');
    }

    /**
     * @param $message
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function destroy($message)
    {
        $this->messageService->destroy($message);
        return redirect()->back()->withFlashSuccess(__('The Message was successfully deleted.'));
    }
}
