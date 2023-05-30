<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function __invoke(Request $request)
    {
        // Validate the form data

        // Send email
        $data = $request->all();

        Mail::to('contact@example.com')->send(new ContactFormMail($data));

        // Redirect back with success message
        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }
}

