<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function submitForm(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|max:255',
            'message' => 'required',
        ]);

        // Save the contact message in the database
        Contact::create($request->all());

        // Redirect with a success message
        return back()->with('success', 'Thank you for contacting us. We will get back to you soon!');
    }
}
