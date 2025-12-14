@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Data Transaksi</h1>



<div class="card shadow mb-4">
    <div class="card-body">
        <p>
            Selamat datang, <b>{{ Auth::user()->name }}</b>
            pada halaman dashboard BigBike Shop dengan hak akses yang Anda miliki sebagai
            <b>
                @if (Auth::user()->usertype == 'admin')
                Admin
                @elseif (Auth::user()->usertype == 'finance')
                Finance
                @elseif (Auth::user()->usertype == 'owner')
                Owner
                @endif
            </b>
        </p>
    </div>
</div>

<div class=" d-sm-flex align-items-center justify-content-end mb-4">
    <a href="{{ route('admin.Transaksi.cetakPDF') }}" class="btn btn-success bg-danger" target="_blank">
        <i class="fa fa-file-pdf"></i>  PDF
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
                            <th>Id Transaksi</th>
                            <th>Nama Motor</th>
                            <th>Jenis</th>
                            <th>qty</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Transaksi as $item)
                        <tr>
                            <td>{{ $item->id_transaksi }}</td>
                            <td>{{ $item->nama_motor }}</td>
                            <td>
                                @if ($item->jenis == 'masuk')
                                <span class="badge badge-success px-3 py-2">{{ $item->jenis }}</span>
                                @else
                                <span class="badge badge-danger px-3 py-2">{{ $item->jenis }}</span>
                                @endif
                            </td>
                            <td>{{ $item->qty }}</td>
                            <td>Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>Rp{{ number_format($item->subtotal, 0, ',', '.') }}</td>
                            <td>
                                <div class="d-flex">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('admin.Transaksi.edit', $item->id_transaksi) }}" class="btn btn-sm btn-warning mr-2">
                                        <i class="fas fa-pen"></i>
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('admin.Transaksi.destroy', $item->id_transaksi) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus user ini?')">
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