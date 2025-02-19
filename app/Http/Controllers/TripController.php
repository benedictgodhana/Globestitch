<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trips = Trip::all();
        return view('trips.index', compact('trips'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view for creating a new experience
        return view('trips.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate input
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
    ]);

    // Handle image upload if provided
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('trip_images', 'public');
        $validatedData['image'] = $imagePath;
    }

    // Create trip with authenticated user
    $trip = Trip::create([
        'title' => $validatedData['title'],
        'description' => $validatedData['description'],
        'image' => $validatedData['image'] ?? null,
        'start_date' => $validatedData['start_date'],
        'end_date' => $validatedData['end_date'],
        'created_by' => Auth::id(),
    ]);

    return response()->json([
        'message' => 'Trip created successfully',
        'trip' => $trip
    ], 201);
}


    /**
     * Display the specified resource.
     */
    public function show(Trip $trip)
    {
        return response()->json($trip);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trip $trip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trip $trip)
    {
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'image' => 'nullable|string',
            'start_date' => 'sometimes|date',
            'end_date' => 'sometimes|date|after_or_equal:start_date',
        ]);

        $trip->update($validated);
        return response()->json($trip);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trip $trip)
    {
        $trip->delete();
        return response()->json(['message' => 'Trip deleted successfully']);
    }
}
