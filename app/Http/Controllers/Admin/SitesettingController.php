<?php

namespace App\Http\Controllers\Admin;

use App\Models\SiteSetting;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SitesettingController extends Controller
{
    use ImageUploadTrait;
    public function index(){
        $site_data = SiteSetting::first();
        return view('admin.site_setting.index',compact('site_data'));
    }

    public function update(Request $request){
        $request->validate([
            'countryCode' => 'nullable|string|max:5',
            'site_name' => 'nullable|string|max:255',
            'phone'       => 'nullable|string|max:20',
            'email'       => 'nullable|email|max:255',
            'address'     => 'nullable|string',
            'facebook'    => 'nullable|url|max:255',
            'linkedin'    => 'nullable|url|max:255',
            'instagram'   => 'nullable|url|max:255',
            'logo'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'favicon'     => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', 
        ]);

        $data      = SiteSetting::firstOrNew([]);

        if($request->hasFile('logo')) {
           $logo = $this->uploadImage($request, 'logo', 'backend/images/site_contents');
           if($data->logo && file_exists(public_path($data->logo))) {
               unlink(public_path($data->logo));
           }
        }
        if($request->hasFile('favicon')) {
            $favicon = $this->uploadImage($request, 'favicon', 'backend/images/site_contents');
            if($data->favicon && file_exists(public_path($data->favicon))) {
                unlink(public_path($data->favicon));
            }
         }

        $data->fill([
            'country_code'=> $request->countryCode,
            'site_name'    => $request->site_name,
            'number'      => $request->phone,
            'email'       => $request->email,
            'address'     => $request->address,
            'facebook'    => $request->facebook,
            'instagram'   => $request->instagram,
            'linkedin'    => $request->linkedin,
            'whatsapp'    => $request->whatsapp,
            'logo'        => $logo ?? $data->logo,
            'favicon'     => $favicon ?? $data->favicon,
        ])->save();

        return redirect()->back()->with('success', 'Data updated successfully');
    }
}
