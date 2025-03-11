<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Models\Reservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $reservations = Reservations::with('services')->get();
            return response()->json(['status' => 'success', 'data' => $reservations], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */         
    public function create()
    {
        $services = Services::all(); // Ambil semua data services
        return view('index', compact('services')); // Kirim data ke view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'date' => 'required|date',
            'services' => 'required|array',
            'services.*' => 'exists:services,id'
        ]);

        DB::beginTransaction();
        try {
            $reservationData = $request->only(['user_id', 'name', 'phone', 'date']);
            $reservationData['status'] = 'pending';

            $reservation = Reservations::create($reservationData);

            $reservation->services()->attach($request->services);

            DB::commit();
            return response()->json(['status' => 'success', 'data' => $reservation->load('services')], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $reservation = Reservations::with('services')->find($id);
            if (!$reservation) {
                return response()->json(['status' => 'error', 'message' => 'Reservation not found'], 404);
            }
            return response()->json(['status' => 'success', 'data' => $reservation ], 201);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservations $reservations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Validasi data dari request
            $request->validate([
                'name' => 'sometimes|string|max:255',
                'date' => 'sometimes|date',
                'phone' => 'sometimes|string|max:15',
                'service_ids' => 'sometimes|array',
                'service_ids.*' => 'exists:services,id'
            ]);
    
            // Cari reservasi berdasarkan ID
            $reservation = Reservations::find($id);
            if (!$reservation) {
                return response()->json(['status' => 'error', 'message' => 'Reservation not found'], 404);
            }
    
            $reservation->update($request->only(['name', 'date', 'phone']));
    
            $reservation->status = 'pending';
            $reservation->save();
    
            // Sinkronisasi layanan jika ada perubahan
            if ($request->has('service_ids')) {
                $reservation->services()->sync($request->service_ids);
            }

            $updatedReservation = Reservations::with('services')->find($id);
    

            return response()->json(['status' => 'success', 'message' => 'Reservation updated', 'reservation' =>  $updatedReservation]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservations $reservations, $id)
    {
        try {
            $reservation = Reservations::find($id);
            if (!$reservation) {
                return response()->json(['status' => 'error', 'message' => 'Reservation not found'], 404);
            }

            $reservation->services()->detach(); // Hapus relasi layanan
            $reservation->delete();

            return response()->json(['status' => 'success', 'message' => 'Reservation deleted']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
