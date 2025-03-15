<?php

namespace App\Http\Controllers;

use auth;
use Carbon\Carbon;
use App\Models\Service;
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
            $reservations = Reservation::all()->map(function ($reservation) {
                $reservation->formatted_date = Carbon::parse($reservation->date)->format('d M Y');
                return $reservation;
            });
    
            return view('reservations.index', compact('reservations'));
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }


    /**
     * Show the form for creating a new resource.
     */         
    public function create()
    {
        try {
            $services = Service::all(); // Ambil semua layanan dari database

            return view('index', compact('services'));
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat mengambil data layanan.'.$e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

  
        try {
            $services = $request->input('services');

            // Jika dikirim sebagai string JSON, decode menjadi array
            if (is_string($services)) {
                $services = json_decode($services, true);
            }

            // Pastikan services adalah array
            if (!is_array($services)) {
                return response()->json(['status' => 'error', 'message' => 'Invalid services format'], 400);
            }

            // Gabungkan data services ke request agar validasi bisa membaca sebagai array
            $request->merge(['services' => $services]);
            
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
            $reservationData['user_id'] = $user->id;
            $reservationData['status'] = 'pending';
    
            $reservation = Reservation::create($reservationData);
    
            $reservation->services()->attach($request->services);
    
            DB::commit();
            return redirect()->route('index')->with('success', 'Reservasi berhasil dibuat.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            if ($id) {
                $reservations = Reservation::where('id', $id)->with('services')->get();
            } else {
                $reservations = Reservation::with('services')->get();
            }
    
            return view('reservations.index', compact('reservations'));
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
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

    public function approve($id)
    {
        try {
            $reservation = Reservation::findOrFail($id);
            $reservation->status = 'confirmed';
            $reservation->save();

            return redirect()->back()->with('success', 'Reservasi berhasil disetujui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function reject($id)
    {
        try {
            $reservation = Reservation::findOrFail($id);
            $reservation->status = 'cancelled';
            $reservation->save();

            return redirect()->back()->with('success', 'Reservasi berhasil ditolak.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
