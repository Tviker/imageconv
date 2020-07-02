<?php


namespace App\Http\Controllers;

use App\Helpers\ImageConv;
use App\Http\Requests\ImageStoreRequest;
use App\ImageResult;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
     * @return View
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Store image and redirect to result
     * @param ImageStoreRequest $request
     * @return RedirectResponse
     */
    public function store(ImageStoreRequest $request)
    {
        $hash = $this->imageConv->converting($request->file('image'), $request->get('output'));
        return redirect()->route('image.show', compact('hash'));
    }

    /**
     * Show results image
     * @param Request $request
     * @return View
     */
    public function show(Request $request)
    {
        $images = ImageResult::where('hash_image', $request->get('hash'))->get();
        return view('show', compact('images'));
    }

}
