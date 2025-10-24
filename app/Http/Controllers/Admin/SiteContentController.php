<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurTopService;
use App\Models\PlanHigherEducation;
use App\Models\WhyUS;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class SiteContentController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        $s2_data = PlanHigherEducation::first();
        $s3_data = OurTopService::first();
        $s4_data = WhyUS::first();
        return view('admin.site_contents.index', compact('s2_data', 's3_data','s4_data'));
    }

    //store section 2 data
    public function updateSectionTwo(Request $request)
    {
        $request->validate([
            'title'              => 'required|string',
            'header'             => 'required|string',
            'card_1_header'      => 'required|string',
            'card_1_description' => 'required|string',
            'card_2_header'      => 'required|string',
            'card_2_description' => 'required|string',
            'card_3_header'      => 'required|string',
            'card_3_description' => 'required|string',
        ]);
        try {
            $data = PlanHigherEducation::firstOrNew([]);
            $data->fill([
                'title'                  => $request->title,
                'header'                 => $request->header,
                'card_header_one'        => $request->card_1_header,
                'card_header_two'        => $request->card_2_header,
                'card_header_three'      => $request->card_3_header,
                'card_description_one'   => $request->card_1_description,
                'card_description_two'   => $request->card_2_description,
                'card_description_three' => $request->card_3_description,
            ])->save();

            return redirect()->back()->with('success', 'Data updated successfully');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

    }

    //store section 3 data
    public function updateSectionThree(Request $request)
    {
        $request->validate([
            'title'           => 'required|string',
            'header'          => 'required|string',
            'description'     => 'required|string',
            'image'           => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        try {
            $data      = OurTopService::firstOrNew([]);
            $imagePath = $data->image ?? null;

            if ($request->hasFile('image')) {
                $path = $this->uploadImage($request, 'image', 'backend/images/site_contents');
                if ($data->image && file_exists(public_path($data->image))) {
                    unlink(public_path($data->image));
                }
                $imagePath = $path;
            }

            $data->fill([
                'image'           => $imagePath,
                'title'           => $request->title,
                'header'          => $request->header,
                'description'     => $request->description,
                'sub_description' => $request->sub_description,

            ])->save();

            return redirect()->back()->with('success', 'Data updated successfully');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

    }

    //store section 4 data
    public function updateSectionFour(Request $request)
    {
        $request->validate([
            'title'              => 'required|string',
            'header'             => 'required|string',
            'card_1_image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'card_2_image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'card_3_image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'card_4_image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'card_1_header'      => 'required|string',
            'card_2_header'      => 'required|string',
            'card_3_header'      => 'required|string',
            'card_4_header'      => 'required|string',
            'card_1_description' => 'required|string',
            'card_2_description' => 'required|string',
            'card_3_description' => 'required|string',
            'card_4_description' => 'required|string',
        ]);
    
        try {
            $data = WhyUS::firstOrCreate([]);
    
            $imageMap = [
                'card_1_image' => 'card_image_one',
                'card_2_image' => 'card_image_two',
                'card_3_image' => 'card_image_three',
                'card_4_image' => 'card_image_four',
            ];
    
            foreach ($imageMap as $inputName => $dbField) {
                if ($request->hasFile($inputName)) {
                    $path = $this->uploadCustomImage($request->file($inputName), 'backend/images/site_contents');
    
                    // Delete old image if it exists
                    if (!empty($data->$dbField) && file_exists(public_path($data->$dbField))) {
                        unlink(public_path($data->$dbField));
                    }
    
                    $data->$dbField = $path;
                }
            }
    
            $data->update([
                'title'                  => $request->title,
                'header'                 => $request->header,
                'card_header_one'        => $request->card_1_header,
                'card_header_two'        => $request->card_2_header,
                'card_header_three'      => $request->card_3_header,
                'card_header_four'       => $request->card_4_header,
                'card_description_one'   => $request->card_1_description,
                'card_description_two'   => $request->card_2_description,
                'card_description_three' => $request->card_3_description,
                'card_description_four'  => $request->card_4_description,
            ]);
    
            return redirect()->back()->with('success', 'Data updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    
    private function uploadCustomImage($file, $folder)
    {
        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
    
        $path = $folder . '/' . $fileName;
    
        $file->move(public_path($folder), $fileName);
    
        return $path;
    }


}
