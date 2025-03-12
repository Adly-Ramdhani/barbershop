<?php

namespace App\Http\Controllers;

use App\Models\Services;
use auth;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $reservations = Reservation::with('services')->get();
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
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:15',
                'date' => 'required|date',
                'services' => 'required|array',
                'services.*' => 'exists:services,id'
            ]);
    
            DB::beginTransaction();
            
            // Ambil user_id dari user yang sedang login
            $user = auth()->user();
            // dd( $user);
            if (!$user) {
                return response()->json(['status' => 'error', 'message' => 'User not authenticated'], 401);
            }
    
            $reservationData = $request->only(['name', 'phone', 'date']);
            $reservationData['user_id'] = $userId;
            $reservationData['status'] = 'pending';
    
            $reservation = Reservation::create($reservationData);
    
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
            $reservation = Reservation::with('services')->find($id);
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
    public function edit(Reservation $reservations)
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
                'services' => 'required|array',
                'services.*' => 'exists:services,id'
            ]);
    
            // Cari reservasi berdasarkan ID
            $reservation = Reservation::find($id);
            if (!$reservation) {
                return response()->json(['status' => 'error', 'message' => 'Reservation not found'], 404);
            }
    
            $reservation->update($request->only(['name', 'date', 'phone']));
    
            $reservation->status = 'pending';
            $reservation->save();
    
            // Sinkronisasi layanan jika ada perubahan
            if ($request->has('services')) {
                $reservation->services()->sync($request->services);
            }

            $updatedReservation = Reservation::with('services')->find($id);
    

            return response()->json(['status' => 'success', 'message' => 'Reservation updated', 'reservation' =>  $updatedReservation]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservations, $id)
    {
        try {
            $reservation = Reservation::find($id);
            if (!$reservation) {
                return response()->json(['status' => 'error', 'message' => 'Reservation not found'], 404);
            }

            $reservation->delete();

            return response()->json(['status' => 'success', 'message' => 'Reservation deleted']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
