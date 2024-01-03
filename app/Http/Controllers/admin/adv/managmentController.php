<?php

namespace App\Http\Controllers;

use App\Models\ADS;
use Illuminate\Http\Request;

class ADController extends Controller
{
    public function index()
    {
        $ads = ADS::all();
        return response()->json($ads);
    }

    public function store(Request $request)
    {
        // Assuming you have additional fields to be saved in the 'a_d_s' table
        $request->validate([
            // Add validation rules for your fields
        ]);

        $ad = new ADS();
        // Set the values of your fields based on the request data
        $ad->save();

        return response()->json($ad, 201);
    }

    public function show($id)
    {
        $ad = ADS::findOrFail($id);
        return response()->json($ad);
    }

    public function update(Request $request, $id)
    {
        // Assuming you have additional fields to be updated in the 'a_d_s' table
        $request->validate([
            // Add validation rules for your fields
        ]);

        $ad = ADS::findOrFail($id);
        // Update the values of your fields based on the request data
        $ad->save();

        return response()->json($ad);
    }

    public function destroy($id)
    {
        $ad = ADS::findOrFail($id);
        $ad->delete();

        return response()->json(['message' => 'AD deleted successfully']);
    }
}
