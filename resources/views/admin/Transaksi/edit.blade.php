@extends('layouts.admin')
@section('content')
<div class="container">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Transaksi</h1>
    </div>

    <form action="{{ route('admin.Transaksi.update', $transaksi->id_transaksi) }}" method="POST">
        @csrf
        @method('PUT')


        <div class="mb-3">
            <label class="form-label">Nama Motor</label>
            <select name="id_motor" class="form-control" required>
                @foreach($motor as $m)
                <option value="{{ $m->id_motor }}"
                    {{ $transaksi->id_motor == $m->id_motor ? 'selected' : '' }}>
                    {{ $m->nama_motor }}
                </option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label class="form-label">Jenis</label>
            <select name="jenis" class="form-control" required>
                <option value="masuk" {{ $transaksi->jenis == 'masuk' ? 'selected' : '' }}>Masuk</option>
                <option value="keluar" {{ $transaksi->jenis == 'keluar' ? 'selected' : '' }}>Keluar</option>
            </select>
        </div>


        <div class="mb-3">
            <label class="form-label">Qty</label>
            <input type="number" name="qty" class="form-control"
                value="{{ old('qty', $transaksi->qty) }}" required>
        </div>


        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control"
                value="{{ old('harga', $transaksi->harga) }}" required>
        </div>

        <button type="submit" class="btn bg-success btn-primary">Update</button>
        <a href="{{ route('admin.Transaksi.index') }}" class="btn bg-danger btn-secondary">Kembali</a>
    </form>
</div>
@endsection