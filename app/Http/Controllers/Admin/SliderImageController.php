<?php

namespace App\Http\Controllers\Admin;

use App\Models\SliderImage;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderImageController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = SliderImage::latest()->paginate(10);
        return view('admin.slider_image.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'image'     => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'type'      => 'required|string',
            'title'     => 'nullable|required_if:type,Certificate|string',
            'header'    => 'nullable|required_if:type,Certificate|string',
        ]);

        if ($request->hasFile('image')) {
            $path           = $this->uploadImage($request, 'image', 'backend/images/site_contents');
            $data           = new SliderImage();
            $data->image    = $path ?? null;
            $data->type     = $request->type;
            $data->title    = $request->title;
            $data->header   = $request->header;
            $data->save();
            return redirect()->back()->with('success', 'Slider image added successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = SliderImage::findOrFail($id);
        return view('admin.slider_image.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'type'      => 'required|string',
            'title'     => 'nullable|required_if:type,Certificate|string',
            'header'    => 'nullable|required_if:type,Certificate|string',
        ]);

        $data           = SliderImage::findOrFail($id);
        if ($request->hasFile('image')) {
            $path           = $this->uploadImage($request, 'image', 'backend/images/site_contents');
            if($data->image && file_exists(public_path($data->image))){
                unlink(public_path($data->image));
            }
            $data->image    = $path ?? null;
        }
        $data->type         = $request->type;
        $data->title        = $request->title;
        $data->header       = $request->header;
        $data->save();
        return redirect()->route('slider_image.index')->with('success', 'Slider image updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = SliderImage::findOrFail($id);
        if($data->image && file_exists(public_path($data->image))){
            unlink(public_path($data->image));
        }
        $data->delete();
        return redirect()->back()->with('success', 'Slider image deleted successfully');
    }
}
