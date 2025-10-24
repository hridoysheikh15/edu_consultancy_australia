<?php

namespace App\Http\Controllers\front_controllers;

use App\Models\WhyUS;
use App\Models\AboutUs;
use App\Models\Courses;
use App\Models\ContactUs;
use App\Models\Subscriber;
use App\Models\University;
use App\Models\AboutUsCard;
use App\Models\Scholarship;
use App\Models\SiteSetting;
use App\Models\SliderImage;
use App\Models\HeaderSlider;
use Illuminate\Http\Request;
use App\Models\OurTopService;
use App\Models\UniversityCard;
use App\Models\UniversityLogo;
use App\Models\StudyDestination;
use App\Models\PlanHigherEducation;
use App\Http\Controllers\Controller;
use App\Models\StudyDestinationCard;
use Illuminate\Validation\ValidationException;

class HomeController extends Controller
{
    public function index() 
    {
        $headerSliders          = HeaderSlider::all(); 
        $planEducation          = PlanHigherEducation::first();
        $topService             = OurTopService::first();
        $sliderImages           = SliderImage::all();
        $universitys            = University::all();
        $siteSetting            = SiteSetting::all();
        $jsonPath               = resource_path('views/country.json');
        $countries              = json_decode(file_get_contents($jsonPath), true);

        return view('frontend.home.index',compact(
            'headerSliders' , 
            'planEducation',
            'topService', 
            'sliderImages', 
            'countries',
            'universitys', 
            'siteSetting'            
        ));
    }

    public function about() {        
        $pageLayout = AboutUs::first();
        $cards = AboutUsCard::all();
        return view('frontend.about.index', compact('pageLayout', 'cards'));
    }

    public function destination() { 
        $pageLayout = StudyDestination::first();
        $cards = StudyDestinationCard::all();
        return view('frontend.destination.index', compact('pageLayout', 'cards'));
    }

    public function universities() { 
        $layout = University::first();
        $logos = UniversityLogo::all();
        $cards = UniversityCard::all();
    
        return view('frontend.university.index', compact('layout', 'logos', 'cards'));
    }

    public function courses() { 
        $layout = University::first();
        $courses = Courses::all();
        return view('frontend.course.index', compact('layout', 'courses'));
    }

    public function scholarship() { 
        $pageLayout = Scholarship::first();
        return view('frontend.scholarship.index',compact('pageLayout'));
    }

    public function contactUs(Request $request){
        try {
            $validatedData = $request->validate([
                'name'        => 'required|string',
                'number'      => 'required|numeric',
                'email'       => 'required|email',
                'program'     => 'required|string',
                'code'        => 'required',
            ]);

            $contactUs = new ContactUs();
            $contactUs->name        = $request->name;
            $contactUs->phone       = $request->number;
            $contactUs->code        = $request->code;
            $contactUs->email       = $request->email;
            $contactUs->program     = $request->program;
            $contactUs->save();

            return response()->json(['status' => 200, 'message' => 'Form submitted successfully!', 'data' => $validatedData]);
            

        } catch (ValidationException $e) {
            return response()->json([
                'status' => 422,
                'errors' => $e->errors()
            ], 422);
        }
    }

    public function subscribe(Request $request){
        try {
            $validatedData = $request->validate([
                'email' => 'required|email',
            ]);

           $subscribe = new Subscriber();
           $subscribe->email = $request->email;
           $subscribe->save();
          
           return redirect()->back()->with('success', 'You have successfully subscribed to our newsletter.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
