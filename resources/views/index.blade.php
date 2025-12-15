@extends('layouts.app')

@section('title', 'Halaman Mahasiswa')

@section('content')
    @auth
        <h2>Dashboard Mahasiswa</h2>
        <h3>Selamat datang, {{ Auth::user()->name }}</h3>
        <p>Berikut data tabel mahasiswa:</p>
        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                    <th>SKS</th>
                    <th>IPK</th>
                    <th>Status</th>
                    <th>Kategori</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $mhs)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mhs->nim }}</td>
                        <td>{{ $mhs->nama }}
                            @if ($mhs->ipk > 3.5)
                                <span class="text-success">Cumlaude</span>
                            @endif
                        </td>
                        <td>{{ $mhs->prodi }}</td>
                        <td>{{ $mhs->sks }}</td>
                        <td>{{ $mhs->ipk }}</td>
                        <td>
                            @if ($mhs->sks < 144)
                                <span class="text-danger">Belum Lulus</span>
                            @else
                                <span class="text-success">Lulus</span>
                            @endif
                        </td>
                        <td>
                            @if ($mhs->sks < 80)
                                Mahasiswa Baru
                            @elseif ($mhs->sks > 80 && $mhs->sks < 140)
                                Mahasiswa Madya
                            @else
                                Mahasiswa Akhir
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Anda belum login!</p>
        <p>Silahkan lakukan <a href="{{ Route('login') }}">Login</a> atau <a href="{{ Route('register') }}">Registrasi</a></p>
    @endauth
@endsection