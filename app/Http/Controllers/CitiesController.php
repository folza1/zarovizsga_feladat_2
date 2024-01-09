<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function getCitiesByCountry(Request $request, $countryId)
    {
        $cityName = $request->input('name');

        $query = City::where('country_id', $countryId);

        if ($cityName) {
            $query->where('name', 'like', '%' . $cityName . '%');
        }

        $cities = $query->get();

        return response()->json($cities);
    }
}
