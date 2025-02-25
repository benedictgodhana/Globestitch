<?php

namespace App\Http\Controllers;

use App\Models\inquiry;
use App\Models\Trip;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index(Request $request)
    {
        $query = Inquiry::with('trip'); // Eager load trip relationship

        // Search by name or email
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%")
                  ->orWhere('email', 'LIKE', "%$search%");
            });
        }

        // Filter by trip_id
        if ($request->filled('trip_id')) {
            $query->where('trip_id', $request->trip_id);
        }

        // Fetch inquiries
        $inquiries = $query->get();

        // Get distinct trips with their titles
        $tripIds = Trip::select('id', 'title')->distinct()->get();

        return view('inquiries.index', compact('inquiries', 'tripIds'));
    }


}
