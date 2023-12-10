<?php

namespace App\Http\Controllers;

use App\Models\REC;
use Illuminate\Http\Request;

//Others
use App\Models\Device;

class RECController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recs = REC::paginate(10); ; // Assuming you have defined a 'device' relationship in the REC model
        return view('recs.index', compact('recs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $devices = Device::all();
        // dd($devices);
        return view('recs.create', compact('devices'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // Add validation rules for your fields
        ]);

        REC::create($request->all());

        return redirect()->route('recs.index')->with('success', 'REC created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(REC $rEC)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(REC $rEC)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, REC $rEC)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(REC $rEC)
    {
        //
    }
}
