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
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'projectType' => 'required|string|in:web-development,mobile-app,ui-ux-design,business-intelligence,digital-transformation,consultation,other',
            'budget' => 'nullable|string|in:under-5k,5k-15k,15k-50k,50k-100k,over-100k,discuss',
            'timeline' => 'nullable|string|in:asap,1-3-months,3-6-months,6-12-months,flexible',
            'message' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $contact = Contact::create([
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'email' => $request->email,
                'phone' => $request->phone,
                'company' => $request->company,
                'position' => $request->position,
                'project_type' => $request->projectType,
                'budget' => $request->budget,
                'timeline' => $request->timeline,
                'message' => $request->message,
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
