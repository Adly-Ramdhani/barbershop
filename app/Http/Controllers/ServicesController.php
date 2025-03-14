<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ServicesController extends Controller
{
    use SoftDeletes;

    public function index()
    {

        $services = Service::all();
        dd($services); 
        return view('services.index', compact('services'));
    }

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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
        ]);

        Service::create($validated);

        return to_route('services.index');
    }

    public function show(Services $services, $id)
    {
        try {
            // Cari data berdasarkan ID
            $service = Service::findOrFail($id);

            // Jika data ditemukan, tampilkan di view
            return view('services.show', compact('service'));
        } catch (\Exception $e) {
            // Jika data tidak ditemukan, redirect dengan pesan error
            return redirect()->route('services.index')->with('error', 'Data tidak ditemukan.');
        } catch (\Exception $e) {
            // Tangani error lainnya
            return redirect()->route('services.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Services $services)
    // {
    //     // dd($services);
    //     return view('services.edit', compact('services'));
    // }
    public function edit($id)
    {
        $service = Service::findOrFail($id); // Ambil data berdasarkan ID
        return view('services.edit', compact('service'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required',
            ]);

            // Coba update data
            $service->update($validated);

            return redirect()->route('services.index')->with('success', 'Service berhasil diupdate.');
        } catch (\Exception $e) {
            // Jika terjadi error, tangkap pesan errornya
            return redirect()->back()->with('error', 'Gagal mengupdate service: ' . $e->getMessage());
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Services $service)
    {
        try {
            $service->delete();
            return to_route('services.index')
                ->with('success', 'Services berhasil dihapus.');
        } catch (\Exception $e) {
            return to_route('services.index')
                ->with('error', 'Gagal menghapus Service: ' . $e->getMessage());
        }
    }
}
