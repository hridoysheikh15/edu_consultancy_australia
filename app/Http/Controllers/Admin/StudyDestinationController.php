<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\StudyDestination;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;
use App\Models\StudyDestinationCard;

class StudyDestinationController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function pageLayout()
    {
        $pageLayout = StudyDestination::first();
        return view('admin.study_destination.page_layout', compact('pageLayout'));
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
            $data = StudyDestination::firstOrNew([]);
            if ($request->hasFile('section_one_image')) {
                $path = $this->uploadImage($request, 'section_one_image', 'backend/images/site_contents');
                if ($data->image && file_exists(public_path($data->image))) {
                    unlink(public_path($data->image));
                }
                $imagePath = $path;
            }
            $data->fill([
                'section_one_header'        => $request->section_one_header,
                'section_one_description'   => $request->section_one_description,
                'section_one_image'         => $imagePath ?? $data->section_one_image,
            ])->save();

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
            $data = StudyDestination::firstOrNew([]);
            $data->fill([
                'section_two_header'        => $request->section_two_header,
                'section_two_description'   => $request->section_two_description,
            ])->save();

            return redirect()->back()->with('success', 'Section two updated successfully.');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function sectionThreeUpdate(Request $request)
    {
        $request->validate([
            'section_three_header' => 'nullable|string|max:255',
            'section_three_description' => 'nullable|string',
            'section_three_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'section_three_image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'section_three_image.max' => 'The image may not be greater than 2MB.',
            'section_three_header.max' => 'The header may not be greater than 255 characters.',
            'section_three_description.string' => 'The description must be a string.',
            'section_three_header.string' => 'The header must be a string.',
        ]);

        try {
            $data = StudyDestination::firstOrNew([]);
            if ($request->hasFile('section_three_image')) {
                $path = $this->uploadImage($request, 'section_three_image', 'backend/images/site_contents');
                if ($data->image && file_exists(public_path($data->image))) {
                    unlink(public_path($data->image));
                }
                $imagePath = $path;
            }
            $data->fill([
                'section_three_header'        => $request->section_three_header,
                'section_three_description'   => $request->section_three_description,
                'section_three_image'         => $imagePath ?? $data->section_three_image,
            ])->save();

            return redirect()->back()->with('success', 'Section three updated successfully.');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function cardIndex()
    {
        $cards = StudyDestinationCard::all();
        $sectionHeading = StudyDestination::first('section_four_header');
        return view('admin.study_destination.card', compact('cards', 'sectionHeading'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function cardStore(Request $request)
    {
        $request->validate([
            'header'        => 'required|string|max:255',
            'description'   => 'required|string',
        ]);

        $slider                     = new StudyDestinationCard();
        $slider->header             = $request->header;
        $slider->description        = $request->description;
        $slider->save();

        return redirect()->back()->with('success', 'Slider created successfully');
    }

    public function cardEdit(string $id)
    {
        $card = StudyDestinationCard::findOrFail($id);
        return view('admin.study_destination.edit_card', compact('card'));
    }

    public function cardUpdate(Request $request, string $id)
    {
        $request->validate([
            'header'        => 'required|string|max:255',
            'description'   => 'required|string',
        ]);

        $card                     = StudyDestinationCard::findOrFail($id);
        $card->header             = $request->header;
        $card->description        = $request->description;
        $card->save();

        return redirect()->route('study_destination.card')->with('success', 'Slider updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function cardDestroy(string $id)
    {
        $card = StudyDestinationCard::findOrFail($id);
        $card->delete();
        return redirect()->back()->with('success', 'Card deleted successfully');
    }

    public function cardSectionHeading(Request $request)
    {
        $request->validate([
            'card_section_header' => 'required|string|max:255',
        ]);

        try {
            $data = StudyDestination::firstOrNew([]);
            $data->fill([
                'section_four_header' => $request->card_section_header,
            ])->save();

            return redirect()->back()->with('success', 'Card section heading updated successfully.');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
