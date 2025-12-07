@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Data Motor</h1>

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
    <a href="{{ route('admin.motor.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
    </a>
</div>

<!-- Tabel Data Motor -->
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered table-hover table-responsive">
                    <thead class="">
                        <tr>
                            <th>Id Motor</th>
                            <th>Nama Motor</th>
                            <th>Merk</th>
                            <th>CC</th>
                            <th>Warna</th>
                            <th>Stock</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($motor as $item)
                        <tr>
                            <td>{{ $item->id_motor }}</td>
                            <td>{{ $item->nama_motor }}</td>
                            <td>{{ $item->merk }}</td>
                            <td>{{ $item->cc }}</td>
                            <td>{{ $item->warna }}</td>
                            <td>{{ $item->stock }}</td>
                            <td>Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>
                                @if ($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Motor" width="130">
                                @else
                                <span class="text-muted">Tidak ada</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('admin.motor.edit', $item->id_motor) }}" class="btn btn-sm btn-warning mr-2">
                                        <i class="fas fa-pen"></i>
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('admin.motor.destroy', $item->id_motor) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus motor ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted">Belum ada data motor</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection