@extends('layouts.admin')
@section('content')

<!-- Judul dinamis -->
<div class="border border-danger">
    <h3 class="bg-danger text-white p-2 rounded mb-4">{{ $judul }}</h3>

    <div class="row">
        <div class="col">
            <form action="{{ route('admin.Transaksi.store','keluar' ) }}" method='POST' class="action">
                @csrf
                @method('POST')
                <div class="card">
                    <div class="card-body">

                        <div class="form-group mb-3">
                            <label for="id_motor">Pilih Motor</label>
                            <select name="id_motor" id="id_motor" class="form-control" required>
                                <option value="">-- Pilih Motor --</option>
                                @foreach($motor as $m)
                                <option value="{{ $m->id_motor }}">
                                    {{ $m->nama_motor }} (Stock: {{ $m->stock }})
                                </option>
                                @endforeach
                            </select>
                        </div>



                        <div class="form-group mb-3">
                            <label for="qty">qty</label>
                            <input type="number" name='qty' id="qty" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="harga">Harga</label>
                            <input type="number" name='harga' id="harga" class="form-control">
                        </div>
                    </div>
                    <div class="div card-footer" style="padding-left: 5px;">
                        <div class="d-flex justify-content-start" style="gap: 10px;">
                            <button href="{{ route('admin.Transaksi.index') }}" class="btn bg-success font-weight-bold text-white">Simpan</button>
                            <a href="{{ route('admin.Transaksi.index') }}" class="btn bg-danger font-weight-bold text-white"> Kembali </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection