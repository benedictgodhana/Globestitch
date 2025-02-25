<?php

namespace App\Http\Controllers;

use App\Models\bookings;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings=bookings::all();
        return view('bookings.index',compact('bookings')); // Ensure this view file exists
    }

}
