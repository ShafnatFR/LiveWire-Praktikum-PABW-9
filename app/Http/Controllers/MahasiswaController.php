<?php

namespace App\Http\Controllers; // [Tambahkan Namespace]

use Illuminate\Http\Request;

class MahasiswaController extends Controller // [Tambahkan Class Wrapper]
{
    public function index()
    {
        $mahasiswa = [
            ['nim' => '120221001', 'nama' => 'Andi', 'prodi' => 'Informatika', 'sks' => 150, 'ipk' => 3.85],
            ['nim' => '120221002', 'nama' => 'Budi', 'prodi' => 'Sistem Informasi', 'sks' => 75, 'ipk' => 3.20],
            ['nim' => '120221003', 'nama' => 'Caca', 'prodi' => 'Teknik Elektro', 'sks' => 130, 'ipk' => 3.60],
            ['nim' => '120221004', 'nama' => 'Dedi', 'prodi' => 'DKV', 'sks' => 145, 'ipk' => 2.90],
        ];

        return view('index', compact('mahasiswa'));
    }
}