<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    /**
     * Display the contact form.
     */
    public function show()
    {
        return view('contact');
    }

    /**
     * Handle the contact form submission and send the email.
     */
    public function send(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        try {
            Mail::to('hetgoedeeten@quickpoint.nl')->send(new ContactFormMail($validatedData));

            return back()->with('success', 'Je bericht is succesvol verzonden!');

        } catch (\Exception $e) {
            \Log::error('Fout bij het verzenden van de e-mail: ' . $e->getMessage());

            return back()->with('error', 'Er is een probleem opgetreden bij het verzenden van je bericht. Probeer het later opnieuw.');
        }
    }
}
