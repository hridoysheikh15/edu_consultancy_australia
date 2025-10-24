<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactUs;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $contacts           = ContactUs::latest()->get();
        $subscribers        = Subscriber::latest()->paginate(10);
        $totalSubscribers   = Subscriber::all()->count();
        return view('admin.dashboard',compact('contacts','subscribers','totalSubscribers'));
    }
}
