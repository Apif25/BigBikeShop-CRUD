@extends('layouts.admin')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Pemesanan</h1>
</div>

<div class="row">
    <div class="col">
        <form action="{{ route('admin.pemesanan.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="id">Pilih User</label>
                        <select name="id" id="id" class="form-control" required>
                            <option value="">-- Pilih User --</option>
                            @foreach($user as $u)
                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                            @endforeach
                    </div>
                    </select>
                    <div class="form-group mb-3">
                        <label for="id_motor">Pilih Motor</label>
                        <select name="id_motor" id="id_motor" class="form-control" required>
                            <option value="">-- Pilih Motor --</option>
                            @foreach($motor as $m)
                            <option value="{{ $m->id_motor }}">
                                {{ $m->nama_motor }} - Stock: {{ $m->stock }}
                            </option>
                            @endforeach
                    </div>
                    <div class="form-group mb-3">
                        <label for="merk">Merk</label>
                        <input type="numeric" name='merk' id="merk" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="cc">CC</label>
                        <input type="numeric" name='cc' id="cc" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="warna">Warna</label>
                        <input type="numeric" name='warna' id="warna" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="qty">qty</label>
                        <input type="numeric" name='qty' id="qty" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="harga">Harga</label>
                        <input type="numeric" name='harga' id="harga" class="form-control">
                    </div>
                </div>
                <div class="div card-footer" style="padding-left: 5px;">
                    <div class="d-flex justify-content-start" style="gap: 10px;">
                        <button href="{{ route('admin.pemesanan.index') }}" class="btn bg-success font-weight-bold text-white">Simpan</button>
                        <a href="{{ route('admin.pemesanan.index') }}" type="submit" class="btn bg-danger font-weight-bold text-white"> Kembali </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection