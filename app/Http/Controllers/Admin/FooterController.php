<?php

namespace App\Http\Controllers\Admin;

use App\Models\FooterCard;
use Illuminate\Http\Request;
use App\Models\FooterSetting;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;

class FooterController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageLayout = FooterSetting::first();
        $cards = FooterCard::all();
        return view('admin.footer.index', compact('pageLayout', 'cards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function footerSettingUpdate(Request $request)
    {
        
        $request->validate([
            'header' => 'nullable|string',
            'description' => 'nullable|string',
            'branch_header' => 'nullable|string',
        ]);

        $footerSetting = FooterSetting::firstOrNew([]);
        $footerSetting->fill([
            'header' => $request->header,
            'description' => $request->description,
            'branch_title' => $request->branch_header,
        ])->save();

        return redirect()->back()->with('success', 'Footer setting updated successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function cardStore(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string',
            'address' => 'nullable|string',
            'email' => 'nullable|email',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

       $card = new FooterCard();
        $card->header = $request->name;
        $card->address = $request->address;
        $card->email = $request->email;
        $card->phone = $request->phone;
        if ($request->hasFile('image')) {
            $card->image = $this->uploadImage($request, 'image', 'courses');
        }

        $card->save();

        return redirect()->back()->with('success', 'Footer card created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function cardEdit(string $id)
    {
        $card = FooterCard::findOrFail($id);
        return view('admin.footer.edit', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function cardUpdate(Request $request, string $id)
    {
        $request->validate([
            'name' => 'nullable|string',
            'address' => 'nullable|string',
            'email' => 'nullable|email',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $card = FooterCard::findOrFail($id);
        $card->header = $request->name;
        $card->address = $request->address;
        $card->email = $request->email;
        $card->phone = $request->phone;
        
        if($request->hasFile('image')) {
            $logoPath = $this->uploadImage($request, 'image', 'backend/images/university');
            if($card->image && file_exists(public_path($card->image))){
                unlink(public_path($card->image));
            }
            $card->image = $logoPath;
        }

        $card->save();

        return redirect()->route('footer_setting.index')->with('success', 'Footer card updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function cardDestroy(string $id)
    {
        $card = FooterCard::findOrFail($id);
        if ($card->image && file_exists(public_path($card->image))) {
            unlink(public_path($card->image));
        }
        $card->delete();

        return redirect()->back()->with('success', 'Footer card deleted successfully.');
    }
}
