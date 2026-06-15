<?php

namespace App\Services;

use App\Models\Mahasiswa;

class MahasiswaService{
    public function simpanData(array $data)
    {
        return Mahasiswa::create($data);
    }
}