<?php

// app/Http/Controllers/HospitalController.php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::all();
        return view('hospitals.index', compact('hospitals'));
    }

    public function create()
    {
        $cities = City::all();
        $countries = Country::all();
        return view('hospitals.create', compact('cities', 'countries'));
    ;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'zip_code' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:20',
            'official_email' => 'nullable|string|email|max:255',
            'website' => 'nullable|string|max:255',
            'sub_super_admin_id' => 'nullable|exists:users,id',
            'number_of_beds' => 'nullable|integer',
            'number_of_staff' => 'nullable|integer',
            'established_at' => 'nullable|date',
            'white_logo' => 'nullable|string|max:255',
            'dark_logo' => 'nullable|string|max:255',
            'primary_color' => 'nullable|string|max:7',
            'secondary_color' => 'nullable|string|max:7',
            'emergency_contact' => 'nullable|string|max:20',
            'notes' => 'nullable|string',
            'city_id' => 'required|exists:cities,id',
            'country_id' => 'required|exists:countries,id',
            'created_by' => 'nullable|exists:users,id',
            'updated_by' => 'nullable|exists:users,id',
            'deleted_by' => 'nullable|exists:users,id',
        ]);

        Hospital::create($request->all());
        return redirect()->route('hospitals.index')->with('success', 'Hospital created successfully.');
    }

    public function show(Hospital $hospital)
    {
        return view('hospitals.show', compact('hospital'));
    }

    public function edit(Hospital $hospital)
    {
       
        $hospital = Hospital::find($id);
        $cities = City::all();
        $countries = Country::all();
        return view('hospitals.edit', compact('hospital', 'cities', 'countries'));
    }

    public function update(Request $request, Hospital $hospital)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'zip_code' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:20',
            'official_email' => 'nullable|string|email|max:255',
            'website' => 'nullable|string|max:255',
            'sub_super_admin_id' => 'nullable|exists:users,id',
            'number_of_beds' => 'nullable|integer',
            'number_of_staff' => 'nullable|integer',
            'established_at' => 'nullable|date',
            'white_logo' => 'nullable|string|max:255',
            'dark_logo' => 'nullable|string|max:255',
            'primary_color' => 'nullable|string|max:7',
            'secondary_color' => 'nullable|string|max:7',
            'emergency_contact' => 'nullable|string|max:20',
            'notes' => 'nullable|string',
            'city_id' => 'required|exists:cities,id',
            'country_id' => 'required|exists:countries,id',
            'created_by' => 'nullable|exists:users,id',
            'updated_by' => 'nullable|exists:users,id',
            'deleted_by' => 'nullable|exists:users,id',
        ]);

        $hospital->update($request->all());
        return redirect()->route('hospitals.index')->with('success', 'Hospital updated successfully.');
    }

    public function destroy(Hospital $hospital)
    {
        $hospital->delete();
        return redirect()->route('hospitals.index')->with('success', 'Hospital deleted successfully.');
    }


   

}

