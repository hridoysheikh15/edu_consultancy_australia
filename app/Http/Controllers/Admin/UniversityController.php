<?php

namespace App\Http\Controllers\Admin;

use App\Models\University;
use App\Models\UniversityCard;
use App\Models\UniversityLogo;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UniversityController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $universities = University::latest()->get();
    //     return view('admin.university.index', compact('universities'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name'          => 'required|string|max:255',
    //         'image'         => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
    //         'tab_name'      => 'required|string|max:255',
    //         'address'       => 'required|string|max:255',
    //         'rank'          => 'required|numeric|max:255',
    //         'graduate'      => 'required|numeric|max:255',
    //         'description'   => 'required|string',
    //     ]);

    //     if($request->hasFile('image')) {
    //         $path = $this->uploadImage($request, 'image', 'backend/images/university');
    //     }

    //     $university                 = new University();
    //     $university->name           = $request->name;
    //     $university->image          = $path;
    //     $university->tab_name       = $request->tab_name;
    //     $university->address        = $request->address;
    //     $university->rank           = $request->rank;
    //     $university->graduate       = $request->graduate;
    //     $university->desctiption    = $request->description;
    //     $university->save();
    //     return redirect()->back()->with('success', 'University has been added successfully.');
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     $data = University::findOrFail($id);

    //     return view('admin.university.edit', compact('data'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     $request->validate([
    //         'name'          => 'required|string|max:255',
    //         'image'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    //         'tab_name'      => 'required|string|max:255',
    //         'address'       => 'required|string|max:255',
    //         'rank'          => 'required|numeric|max:255',
    //         'graduate'      => 'required|numeric|max:255',
    //         'description'   => 'required|string',
    //     ]);

    //     $university = University::findOrFail($id);
    //     if($request->hasFile('image')) {
    //         $path = $this->uploadImage($request, 'image', 'backend/images/university');
    //         if($university->image && file_exists(public_path($university->image))){
    //             unlink(public_path($university->image));
    //         }
    //         $university->image = $path;
    //     }

    //     $university->name           = $request->name;
    //     $university->tab_name       = $request->tab_name;
    //     $university->address        = $request->address;
    //     $university->rank           = $request->rank;
    //     $university->graduate       = $request->graduate;
    //     $university->desctiption    = $request->description;
    //     $university->save();
    //     return redirect()->route('university.index')->with('success', 'University has been updated successfully.');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     $university = University::findOrFail($id);
    //     if($university->image && file_exists(public_path($university->image))){
    //         unlink(public_path($university->image));
    //     }
    //     $university->delete();
    //     return redirect()->back()->with('success', 'University has been deleted successfully.');
    // }

    public function pageLayout()
    {
        $pageLayout = University::first();
        $logos = UniversityLogo::latest()->get();
        return view('admin.university.page_layout', compact('pageLayout', 'logos'));
    }

    public function updateLayout(Request $request)
    {
        $request->validate([
            'image'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'banner'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'header_one'    => 'required|string|max:255',
            
        ]);

        $data = University::firstOrNew([]);
        if($request->hasFile('image')) {
            $imagePath = $this->uploadImage($request, 'image', 'backend/images/university');
            if($data->image && file_exists(public_path($data->image))){
                unlink(public_path($data->image));
            }
            $data->image = $imagePath;
        }

        if($request->hasFile('banner')) {
            $bannerPath = $this->uploadImage($request, 'banner', 'backend/images/university');
            if($data->banner && file_exists(public_path($data->banner))){
                unlink(public_path($data->banner));
            }
            $data->banner = $bannerPath;
        }

        $data->fill([
            'image'         => $imagePath ?? $data->image,
            'banner'        => $bannerPath ?? $data->banner,
            'header_one'    => $request->header_one,
        ])->save();
        return redirect()->back()->with('success', 'University page layout has been updated successfully.');
    }

    public function universityLogo(Request $request)
    {
        $request->validate([
            'image'  => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'link'   => 'nullable|url|',
        ]);

      
        if($request->hasFile('image')) {
            $logoPath = $this->uploadImage($request, 'image', 'backend/images/university');
        }

        $data = new UniversityLogo();
        $data->link = $request->link ?? "#";
        $data->image = $logoPath;
        $data->save();
        return redirect()->back()->with('success', 'University logo has been updated successfully.');
    }

    public function editLogo($id)
    {
        $logo = UniversityLogo::findOrFail($id);
        return view('admin.university.edit_logo', compact('logo'));
    }

    public function updateLogo(Request $request, $id)
    {
        $request->validate([
            'image'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'link'   => 'nullable|url|',
        ]);

        $logo = UniversityLogo::findOrFail($id);
        if($request->hasFile('image')) {
            $logoPath = $this->uploadImage($request, 'image', 'backend/images/university');
            if($logo->image && file_exists(public_path($logo->image))){
                unlink(public_path($logo->image));
            }
            $logo->image = $logoPath;
        }

        $logo->link = $request->link ?? "#";
        $logo->save();
        return redirect()->route('university.page.layout')->with('success', 'University logo has been updated successfully.');
    }

    public function destroyLogo($id)
    {
        $logo = UniversityLogo::findOrFail($id);
        if($logo->image && file_exists(public_path($logo->image))){
            unlink(public_path($logo->image));
        }
        $logo->delete();
        return redirect()->back()->with('success', 'University logo has been deleted successfully.');
    }

    public function cardIndex()
    {
        $cards = UniversityCard::latest()->get();
        $layout = University::first();
        return view('admin.university.card', compact('layout', 'cards'));
    }

    public function cardLayout(Request $request)
    {
        $request->validate([
            'header'  => 'required|string|max:255',
            'sub_title'  => 'nullable|string|max:255',
        ]);

        $data = University::firstOrNew([]);
        $data->header_two = $request->header;
        $data->sub_title = $request->sub_title;
        $data->save();
        return redirect()->back()->with('success', 'University card layout has been updated successfully.');
    }

    public function cardStore(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'required|string',
        ]);
        $data = new UniversityCard();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();
        return redirect()->back()->with('success', 'University card has been updated successfully.');
    }

    public function cardEdit($id)
    {
        $card = UniversityCard::findOrFail($id);
        return view('admin.university.edit_card', compact('card'));
    }

    public function cardUpdate(Request $request, $id)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'required|string',
        ]);

        $card = UniversityCard::findOrFail($id);
        $card->title = $request->title;
        $card->description = $request->description;
        $card->save();
        return redirect()->route('university.card')->with('success', 'University card has been updated successfully.');
    }

    public function cardDestroy($id)
    {
        $card = UniversityCard::findOrFail($id);
        $card->delete();
        return redirect()->back()->with('success', 'University card has been deleted successfully.');
    }

}
