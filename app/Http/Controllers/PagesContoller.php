<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesContoller extends Controller
{
    public function homepage()
    {
        return view('pages.homepage');
    }

    public function about()
    {
        return view('pages.about', [
            'name' => 'Ihsan Miftahul Huda',
            'address' => 'Bandung',
            'job' => 'Fullstack Developer',
            'image' => 'assets/images/banner.svg'
        ]);
    }

    public function dashboard()
    {
        return view('pages.dashboard');
    }
}
