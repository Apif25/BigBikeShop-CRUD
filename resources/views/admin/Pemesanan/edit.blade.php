@extends('layouts.admin')
@section('content')
<div class="container">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Pemesanan</h1>
    </div>

    <form action="{{ route('admin.pemesanan.update', $pemesanan->id_pemesanan) }}" method="POST">
        @csrf
        @method('PUT')


        <div class="mb-3">
            <label class="form-label">Id User</label>
            <select name="id_motor" class="form-control" required>
                @foreach($user as $u)
                <option value="{{ $u->id_user }}"
                    {{ $pemesanan->id_user == $u->id_user? 'selected' : '' }}>
                    {{ $u->id_user }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Id Motor</label>
            <select name="id_motor" class="form-control" required>
                @foreach($motor as $m)
                <option value="{{ $m->id_motor }}"
                    {{ $pemesanan->id_motor == $m->id_motor? 'selected' : '' }}>
                    {{ $m->id_motor }}
                </option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label class="form-label">Nama Motor</label>
            <select name="id_motor" class="form-control" required>
                @foreach($motor as $m)
                <option value="{{ $m->id_motor }}"
                    {{ $pemesanan->id_motor == $m->id_motor ? 'selected' : '' }}>
                    {{ $m->nama_motor }}
                </option>
                @endforeach
            </select>
        </div>



        <div class="mb-3">
            <label class="form-label"> Merk </label>
            <input type="number" name="merk" class="form-control"
                value="{{ old('merk', $pemesanan->merk) }}" required>
        </div>


        <div class="mb-3">
            <label class="form-label">CC</label>
            <input type="number" name="cc" class="form-control"
                value="{{ old('cc', $pemesanan->cc) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Warna</label>
            <input type="number" name="warna" class="form-control"
                value="{{ old('warna', $pemesanan->warna) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Qty</label>
            <input type="number" name="qty" class="form-control"
                value="{{ old('qty', $pemesanan->qty) }}" required>
        </div>


        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control"
                value="{{ old('harga', $pemesanan->harga) }}" required>
        </div>


        <button type="submit" class="btn bg-success btn-primary">Update</button>
        <a href="{{ route('admin.pemesanan.index') }}" class="btn bg-danger btn-secondary">Kembali</a>
    </form>
</div>
@endsection