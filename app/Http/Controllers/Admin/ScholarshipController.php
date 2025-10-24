<?php

namespace App\Http\Controllers\Admin;

use App\Models\Scholarship;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;

class ScholarshipController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageLayout = Scholarship::first();
        return view('admin.scholarship.index', compact('pageLayout'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function sectionOneUpdate(Request $request)
    {
        $request->validate([
            'section_one_header' => 'nullable|string|max:255',
            'section_one_description' => 'nullable|string',
            'section_one_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'section_one_image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'section_one_image.max' => 'The image may not be greater than 2MB.',
            'section_one_header.max' => 'The header may not be greater than 255 characters.',
            'section_one_description.string' => 'The description must be a string.',
            'section_one_header.string' => 'The header must be a string.',
        ]);

        try {
            $data = Scholarship::firstOrNew([]);

            if ($request->hasFile('section_one_image')) {
                $path = $this->uploadImage($request, 'section_one_image', 'backend/images/site_contents');
            
                // Delete old image if exists
                if ($data->image && file_exists(public_path($data->image))) {
                    unlink(public_path($data->image));
                }
            
                $data->image = $path; // Assign new image path
            }
            
            // Fill other fields and keep image as-is if not updated
            $data->fill([
                'header_one'      => $request->section_one_header,
                'description_one' => $request->section_one_description,
            ]);
            
            $data->save();
            

            return redirect()->back()->with('success', 'Section One updated successfully.');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function sectionTwoUpdate(Request $request)
    {
        $request->validate([
            'section_two_header' => 'nullable|string|max:255',
            'section_two_description' => 'nullable|string',
        ],[
            'section_two_header.max' => 'The header may not be greater than 255 characters.',
            'section_two_description.string' => 'The description must be a string.',
            'section_two_header.string' => 'The header must be a string.',
        ]);

        try {
            $data = Scholarship::firstOrNew([]);
            $data->fill([
                'header_two'        => $request->section_two_header,
                'description_two'   => $request->section_two_description,
            ])->save();

            return redirect()->back()->with('success', 'Section two updated successfully.');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
