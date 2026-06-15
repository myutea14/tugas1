<?php

use App\Http\Controllers\MahasiswaController;

// Pastikan semua route ini berada di bawah middleware 'auth:sanctum'
Route::middleware('auth:sanctum')->group(function () {
    
    Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
    
    // Ini dia kunci utamanya: hanya admin yang bisa hapus
    Route::middleware('role:admin')->delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy']);
    
});