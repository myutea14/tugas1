<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MahasiswaService;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    protected $mahasiswaService;

    // Menghubungkan Service ke Controller melalui Constructor
    public function __construct(MahasiswaService $mahasiswaService)
    {
        $this->mahasiswaService = $mahasiswaService;
    }

    public function index()
    {
        return Mahasiswa::all();
    }

    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
        ]);

        // Error Handling & Memanggil Service
        try {
            $data = $this->mahasiswaService->simpanData($request->all());
            return response()->json(['message' => 'Data berhasil ditambah', 'data' => $data], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menyimpan data'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $mhs = Mahasiswa::findOrFail($id);
        $mhs->update($request->all());
        return response()->json(['message' => 'Data berhasil diubah']);
    }

    public function destroy($id)
    {
        Mahasiswa::destroy($id);
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}