@extends('layouts.admin')
@section('content')

<div class="border border-success">
    <h3 class="bg-success text-white p-2 rounded mb-4">{{ $judul }}</h3>

    <div class="row">
        <div class="col">
            <form action="{{ route('admin.Transaksi.store', 'masuk') }}" method="POST">
                @csrf

                <div class="card">
                    <div class="card-body">

                        {{-- PILIH MOTOR --}}
                        <div class="form-group mb-3">
                            <label for="id_motor">Pilih Motor</label>
                            <select name="id_motor" id="id_motor" class="form-control" required>
                                <option value="">-- Pilih Motor --</option>
                                @foreach($motor as $m)
                                <option value="{{ $m->id_motor }}">
                                    {{ $m->nama_motor }}
                                    (Stock: {{ $m->stock }})
                                    (Harga: {{ $m->harga }})
                                </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- QTY --}}
                        <div class="form-group mb-3">
                            <label for="qty">Qty</label>
                            <input type="number" name="qty" id="qty" class="form-control" required>
                        </div>

                    </div>

                    <div class="card-footer" style="padding-left: 5px;">
                        <div class="d-flex justify-content-start" style="gap: 10px;">
                            <button type="submit" class="btn bg-success font-weight-bold text-white">
                                Simpan
                            </button>
                            <a href="{{ route('admin.Transaksi.index') }}" class="btn bg-danger font-weight-bold text-white">
                                Kembali
                            </a>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection