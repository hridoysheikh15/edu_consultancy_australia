<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
    public function request(){
        $contacts = ContactUs::latest()->paginate(10);
        return view('admin.contact_us.index',compact('contacts'));
    }

    public function makeRead($id){
        $contact = ContactUs::find($id);
        $contact->is_read = 1;
        $contact->save();
       
        return redirect()->back()->with('success', 'Message has been marked as read.');
    }
}
