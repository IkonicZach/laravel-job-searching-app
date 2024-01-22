<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contact.index');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mail' => 'required|email',
            'subject' => 'nullable|string|max:50',
            'body' => 'required|string',
        ]);

        $name = $request->input('name');
        $mail = $request->input('mail');
        $subject = $request->input('subject');
        $body = $request->input('body');

        Mail::to('skilltrack2024@gmail.com')
            ->send(new ContactFormMail($subject, $body, $mail, $name));

        $message = "Sent successfully!";
        $messageBody = "Your Email has been sent successfully!";

        return back()->with(compact('message', 'messageBody'));
    }
}
