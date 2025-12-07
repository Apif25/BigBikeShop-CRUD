@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Data Pemesanan</h1>

<div class="card shadow mb-4">
    <div class="card-body">
        <p>
            Selamat datang, <b>{{ Auth::user()->name }}</b>
            pada halaman dashboard BigBike Shop dengan hak akses yang Anda miliki sebagai
            <b>
                @if (Auth::user()->usertype == 'admin')
                Admin
                @elseif (Auth::user()->usertype == 'user')
                User
                @endif
            </b>
        </p>
    </div>
</div>

<!-- Tombol Tambah -->
<div class="d-sm-flex align-items-center justify-content-end mb-4">
    <a href="{{ route('admin.pemesanan.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
    </a>
</div>

<!-- Tabel Data -->
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>Id Pemesanan</th>
                            <th>Id User</th>
                            <th>Id Motor</th>
                            <th>Nama Motor</th>
                            <th>Merk</th>
                            <th>CC</th>
                            <th>Warna</th>
                            <th>qty</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemesanan as $item)
                        <tr>
                            <td>{{ $item->id_pemesanan }}</td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->id_motor }}</td>
                            <td>{{ $item->nama_motor}}</td>
                            <td>{{ $item->merk }}</td>
                            <td>{{ $item->cc }}</td>
                            <td>{{ $item->warna }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>
                                <div class="d-flex">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('admin.pemesanan.edit', $item->id_pemesanan) }}" class="btn btn-sm btn-warning mr-2">
                                        <i class="fas fa-pen"></i>
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('admin.pemesanan.destroy', $item->id_pemesanan) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-eraser"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection