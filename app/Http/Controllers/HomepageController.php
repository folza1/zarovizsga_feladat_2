<?php

namespace App\Http\Controllers;

use App\Models\Country;

class HomepageController extends Controller
{
    public function index()
    {
        $countries = Country::all();

        return view('welcome', compact('countries'));
    }
}

