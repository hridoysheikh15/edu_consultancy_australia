<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutUs;
use App\Models\AboutUsCard;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function pageLayout()
    {
        $pageLayout = AboutUs::first();
        return view('admin.about_us.page_layout', compact('pageLayout'));
    }

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
            $data = AboutUs::firstOrNew([]);
            if ($request->hasFile('section_one_image')) {
                $path = $this->uploadImage($request, 'section_one_image', 'backend/images/site_contents');
                if ($data->image && file_exists(public_path($data->image))) {
                    unlink(public_path($data->image));
                }
                $imagePath = $path;
            }
            $data->fill([
                'header_one'        => $request->section_one_header,
                'description_one'   => $request->section_one_description,
                'image'             => $imagePath ?? $data->section_one_image,
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
            $data = AboutUs::firstOrNew([]);
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
    public function cardIndex()
    {
        $cards = AboutUsCard::latest()->get();
        $layout = AboutUs::first();
        return view('admin.about_us.card', compact('cards', 'layout'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function cardLayoutUpdate(Request $request)
    {
       
        $request->validate([
            'header' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
        ],[
            'header.max' => 'The header may not be greater than 255 characters.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'header.string' => 'The header must be a string.',
            'title.string' => 'The title must be a string.',
        ]);

        try {
            $data = AboutUs::firstOrNew([]);
            $data->fill([
                'card_header'        => $request->header,
                'card_title'         => $request->title,
            ])->save();

            return redirect()->back()->with('success', 'Card layout updated successfully.');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function cardStore(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ],[
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image may not be greater than 2MB.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'description.string' => 'The description must be a string.',
            'title.string' => 'The title must be a string.',
        ]);

        try {
            $path = $this->uploadImage($request, 'image', 'backend/images/site_contents');
            $card = new AboutUsCard();
           $card->image = $path;
            $card->header = $request->title;
            $card->description = $request->description;
            $card->save();

            return redirect()->back()->with('success', 'Card created successfully.');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function cardEdit($id)
    {
        $card = AboutUsCard::findOrFail($id);
        return view('admin.about_us.edit_card', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function cardUpdate(Request $request, string $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ],[
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image may not be greater than 2MB.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'description.string' => 'The description must be a string.',
            'title.string' => 'The title must be a string.',
        ]);

        try {
            $card = AboutUsCard::findOrFail($id);
            if ($request->hasFile('image')) {
                $path = $this->uploadImage($request, 'image', 'backend/images/site_contents');
                if ($card->image && file_exists(public_path($card->image))) {
                    unlink(public_path($card->image));
                }
                $card->image = $path;
            }
            $card->header = $request->title;
            $card->description = $request->description;
            $card->save();

            return redirect()->route('about_us.card')->with('success', 'Card updated successfully.');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function cardDestroy(string $id)
    {
        try {
            $card = AboutUsCard::findOrFail($id);
            if ($card->image && file_exists(public_path($card->image))) {
                unlink(public_path($card->image));
            }
            $card->delete();
            return redirect()->back()->with('success', 'Card deleted successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
