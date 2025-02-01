<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Homepage
    public function home()
    {
        return view('index'); // Assuming your homepage view is 'home.blade.php'
    }

    // Service Page
    public function service()
    {
        return view('service'); // Assuming your service page view is 'service.blade.php'
    }

    // About Us Page
    public function about()
    {
        return view('about-us'); // View for About Us page
    }

    // Contact Page
    public function contact()
    {
        return view('contact'); // View for Contact page
    }

    // FAQs Page
    public function faqs()
    {
        return view('faqs'); // View for FAQs page
    }
}
