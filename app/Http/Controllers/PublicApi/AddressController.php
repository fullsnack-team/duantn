<?php

namespace App\Http\Controllers\PublicApi;

use App\Http\Controllers\Controller;
use App\Models\Address\Commune;
use App\Models\Address\District;
use App\Models\Address\Province;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function provinces()
    {
        $provinces = Province::all();
        if ($provinces->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No provinces found'
            ]);
        }
        return response()->json([
            'status' => 'success',
            'provinces' => $provinces
        ]);
    }
    public function districts($province_id)
    {
        $districts = District::where('province_id', $province_id)->get();
        if ($districts->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No districts found'
            ]);
        }
        return response()->json([
            'status' => 'success',
            'districts' => $districts
        ]);
    }
    public function communes($district_id)
    {
        $communes = Commune::where('district_id', $district_id)->get();
        if ($communes->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No communes found'
            ]);
        }
        return response()->json([
            'status' => 'success',
            'communes' => $communes
        ]);
    }
}
