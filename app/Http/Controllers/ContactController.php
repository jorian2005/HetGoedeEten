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
        // Deze methode toont het contactformulier.
        // Als je een aparte route hebt voor het tonen, bijvoorbeeld GET /contact,
        // dan gebruik je deze. Zo niet, dan kun je deze weglaten.
        return view('contact'); // 'contact' verwijst naar resources/views/contact.blade.php
    }

    /**
     * Handle the contact form submission and send the email.
     */
    public function send(Request $request)
    {
        // 1. Valideer de inkomende gegevens
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // 2. Verzend de e-mail
        try {
            // Dit is de kern: maak een nieuwe instance van je Mailable class
            // en stuur deze naar het gewenste e-mailadres.
            Mail::to('stefansmit2008@outlook.com')->send(new ContactFormMail($validatedData));

            // Optioneel: Stuur de gebruiker terug met een succesbericht
            return back()->with('success', 'Je bericht is succesvol verzonden!');

        } catch (\Exception $e) {
            // Log de fout voor debugging (belangrijk bij het oplossen van problemen!)
            \Log::error('Fout bij het verzenden van de e-mail: ' . $e->getMessage());

            // Optioneel: Stuur de gebruiker terug met een foutbericht
            return back()->with('error', 'Er is een probleem opgetreden bij het verzenden van je bericht. Probeer het later opnieuw.');
        }
    }
}
