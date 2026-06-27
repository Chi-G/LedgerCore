<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $nameParts = explode(' ', $request->name, 2);
        $firstName = $nameParts[0];
        $lastName = $nameParts[1] ?? 'N/A';

        try {
            $contact = Contact::create([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $request->email,
                'phone' => null,
                'company' => 'Not Provided',
                'position' => null,
                'project_type' => 'other',
                'budget' => null,
                'timeline' => null,
                'message' => "SUBJECT: " . $request->subject . "\n\n" . $request->message,
                'status' => 'new',
            ]);

            Mail::to(config('mail.to'))
                ->send(new ContactFormMail($contact));

            return back()->with('success', 'Thank you for your inquiry! We\'ll get back to you within 2 hours during business hours.');

        } catch (\Exception $e) {
            Log::error('Contact form submission error: '.$e->getMessage());

            return back()->with('error', 'Sorry, there was an error submitting your form. Please try again or contact us directly.');
        }
    }
}
