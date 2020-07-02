<?php


namespace App\Http\Controllers;

use App\Http\Helpers\ImageConv;
use App\Http\Requests\ImageStoreRequest;
use App\ImageResult;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    private $imageConv;

    /**
     * ImageController constructor.
     * @param ImageConv $imageConv
     */
    public function __construct(ImageConv $imageConv)
    {
        $this->imageConv = $imageConv;
    }

    /**
     * Show index page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Store image and redirect to result
     * @param ImageStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ImageStoreRequest $request)
    {
        $hash = $this->imageConv->converting($request->file('image'), $request->get('output'));
        return redirect()->route('image.show', compact('hash'));
    }

    /**
     * Show results image
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request)
    {
        $images = ImageResult::where('hash_image', $request->get('hash'))->get();
        return view('show', compact('images'));
    }

}
