<?php


namespace App\Http\Controllers;

use App\Http\Helpers\ImageConv;
use App\Http\Requests\ImageStoreRequest;
use App\ImageResult;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    private $imageConv;

    public function __construct(ImageConv $imageConv)
    {
        $this->imageConv = $imageConv;
    }

    public function index()
    {
        return view('index');
    }

    public function store(ImageStoreRequest $request)
    {
        $hash = $this->imageConv->converting($request->file('image'), $request->get('output'));
        return redirect()->route('image.show', compact('hash'));
    }

    public function show(Request $request)
    {
        $images = ImageResult::where('hash_image', $request->get('hash'))->get();
        return view('show', compact('images'));
    }

}
