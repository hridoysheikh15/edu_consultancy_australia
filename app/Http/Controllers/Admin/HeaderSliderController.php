<?php

namespace App\Http\Controllers\Admin;

use App\Models\HeaderSlider;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;

class HeaderSliderController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $header_sliders = HeaderSlider::latest()->get();
        return view('admin.header_slider.index',compact('header_sliders'));
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
        $request->validate([
            'title'         => 'required|string|max:255',
            'header'        => 'required|string|max:255',
            'description'   => 'required|string|max:255',
            'image'         => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $slider                     = new HeaderSlider();
        $slider->title              = $request->title;
        $slider->header             = $request->header;
        $slider->short_description  = $request->description;
        $slider->image              = $this->uploadImage($request, 'image', 'backend/images/slider') ?? null;
        $slider->save();

        return redirect()->route('slider.index')->with('success', 'Slider created successfully');
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
        $slider = HeaderSlider::findOrFail($id);
        return view('admin.header_slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'header'        => 'required|string|max:255',
            'description'   => 'required|string',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $slider                     = HeaderSlider::findOrFail($id);
        if($request->hasFile('image')){
            $path = $this->uploadImage($request, 'image', 'backend/images/slider');
            //delete old image
            if($slider->image && file_exists(public_path($slider->image))){
                unlink(public_path($slider->image));
            }
            $slider->image = $path;
        }

        $slider->title              = $request->title;
        $slider->header             = $request->header;
        $slider->short_description  = $request->description;
        $slider->save();

        return redirect()->route('slider.index')->with('success', 'Slider updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = HeaderSlider::findOrFail($id);
        if($slider->image && file_exists(public_path($slider->image))){
            unlink(public_path($slider->image));
        }
        $slider->delete();
        return redirect()->route('slider.index')->with('success', 'Slider deleted successfully');
    }


    
}
