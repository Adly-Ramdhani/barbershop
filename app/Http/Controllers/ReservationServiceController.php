<?php

namespace App\Http\Controllers;

use App\Models\Reservation_service;
use Illuminate\Http\Request;

class ReservationServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        return view('index', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation_service $reservation_service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation_service $reservation_service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation_service $reservation_service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation_service $reservation_service)
    {
        //
    }
}
