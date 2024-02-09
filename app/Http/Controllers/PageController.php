<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function mail()
    {
        return view('mails.job-application-noti');
    }

    public function terms()
    {
        return view('special.terms-and-conditions');
    }

    public function aboutUs()
    {
        return view('special.about-us');
    }

    public function services()
    {
        return view('special.services');
    }

    public function helpCenter()
    {
        return view('helpcenter.overview');
    }

    public function faqs()
    {
        return view('helpcenter.faqs');
    }

    public function guides()
    {
        return view('helpcenter.guides');
    }

    public function support()
    {
        return view('helpcenter.support');
    }
}
