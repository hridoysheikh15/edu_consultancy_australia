<?php

namespace App\Http\Controllers\Admin;

use App\Models\Courses;
use App\Models\University;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layout = University::first();
        $courses = Courses::latest()->get();

        return view('admin.course.index', compact('layout', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function layoutUpdate(Request $request)
    {
        $request->validate([
            'header' => 'nullable|string',
            'sub_title' => 'nullable|string',
        ]);

        $layout = University::firstOrNew([]);
        $layout->fill([
            'course_header' => $request->header,
            'course_sub_title' => $request->sub_title,
        ])->save();
        return redirect()->back()->with('success', 'Layout updated successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $course = new Courses();
        $course->name = $request->name;
        $course->description = $request->description;

        if ($request->hasFile('image')) {
            $course->image = $this->uploadImage($request, 'image', 'courses');
        }

        $course->save();

        return redirect()->back()->with('success', 'Course created successfully');
    }

   
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Courses::findOrFail($id);
        return view('admin.course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $course = Courses::findOrFail($id);
        $course->name = $request->name;
        $course->description = $request->description;

        if($request->hasFile('image')) {
            $logoPath = $this->uploadImage($request, 'image', 'backend/images/university');
            if($course->image && file_exists(public_path($course->image))){
                unlink(public_path($course->image));
            }
            $course->image = $logoPath;
        }

        $course->save();

        return redirect()->route('course.index')->with('success', 'Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Courses::findOrFail($id);
        if ($course->image && file_exists(public_path($course->image))) {
            unlink(public_path($course->image));
        }
        $course->delete();

        return redirect()->back()->with('success', 'Course deleted successfully');
    }
}
