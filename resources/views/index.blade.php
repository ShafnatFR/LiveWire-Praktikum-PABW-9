@extends('layouts.app')

@section('title', 'Halaman Mahasiswa')

@section('content')
    
    {{-- Tampilan jika User BELUM Login --}}
    @guest
        <div class="alert alert-warning text-center">
            <h4>Peringatan</h4>
            <p>Anda belum login. Silahkan login untuk melihat data mahasiswa.</p>
        </div>
    @endguest

    {{-- Tampilan jika User SUDAH Login --}}
    @auth
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                {{-- Menampilkan nama user yang login [cite: 2047] --}}
                <h5 class="mb-0">Selamat datang, <strong>{{ Auth::user()->name }}</strong>!</h5>
            </div>
            <div class="card-body">
                <h4 class="card-title mb-3">Daftar Mahasiswa</h4>
                
                <table class="table table-bordered table-hover table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Program Studi</th>
                            <th>SKS</th>
                            <th>IPK</th>
                            <th>Status</th>
                            <th>Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Looping Data dari Controller --}}
                        @foreach($mahasiswa as $m)
                        <tr>
                            <td>{{ $m['nim'] }}</td>
                            <td>
                                {{ $m['nama'] }}
                                {{-- Ketentuan: IPK > 3.50 ada tanda bintang/badge [cite: 2048] --}}
                                @if($m['ipk'] > 3.50)
                                    <span class="badge bg-warning text-dark">⭐ Cumlaude</span>
                                @endif
                            </td>
                            <td>{{ $m['prodi'] }}</td>
                            <td>{{ $m['sks'] }}</td>
                            <td>{{ $m['ipk'] }}</td>
                            
                            {{-- Ketentuan Status Lulus/Belum --}}
                            <td>
                                @if($m['sks'] < 144)
                                    <span class="text-danger fw-bold">Belum Lulus</span>
                                @else
                                    <span class="text-success fw-bold">Lulus</span>
                                @endif
                            </td>
                            
                            {{-- Ketentuan Kategori Mahasiswa [cite: 2050-2051] --}}
                            <td>
                                @if($m['sks'] < 80)
                                    Mahasiswa Baru
                                @elseif($m['sks'] >= 80 && $m['sks'] < 140)
                                    Mahasiswa Madya
                                @else
                                    Mahasiswa Akhir
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endauth

@endsection