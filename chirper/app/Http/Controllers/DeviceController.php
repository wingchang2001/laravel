<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $devices = Device::paginate(10); 
        return view('devices.index', compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('devices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validate the form data
         $validatedData = $request->validate([
            'registry_name' => 'required|string|max:255',
            'registry_id' => 'required|string|max:255',
            'capacity_mw' => 'required|numeric',
            'fuel_type' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'province' => 'nullable|string|max:255',
            'registry' => 'required|string|max:255',
            'connected_to_grid' => 'required|boolean',
            'feed_in_tariff' => 'required|boolean',
            'percentage_renewable' => 'required|numeric|between:0,100',
            'labelling_schemes' => 'nullable|string|max:255',
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
            'registration_date' => 'required|date',
            'commission_date' => 'required|date',
            'address_local' => 'nullable|string|max:255',
            'address_english' => 'required|string|max:255',
            'device_type' => 'required|string|max:255',
        ]);

        // Create a new device instance
        $device = Device::create($validatedData);

        // Redirect or do something else
        return redirect()->route('devices.index')->with('success', 'Device created successfully!');     
        // return redirect('/office');  
    }

    /**
     * Display the specified resource.
     */
    public function show(Device $device)
    {
        return view('devices.show', compact('device'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Device $device)
    {
        return view('devices.edit', compact('device'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Device $device)
    {
         // Validate and update the device data
        $request->validate([
            // Add validation rules here
        ]);
    
        $device->update($request->all());
    
        return redirect()->route('devices.index')->with('success', 'Device updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Device $device)
    {
        $device->delete();
        return redirect()->route('devices.index')->with('success', 'Device deleted successfully!');
    }
}
