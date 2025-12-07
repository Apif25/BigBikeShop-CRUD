@extends('layouts.admin')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ubah Motor</h1>
</div>

<div class="row">
    <div class="col">

    
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        
        <form action="{{ route('admin.motor.update', $motor->id_motor) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="card">
                <div class="card-body">

                    
                    <div class="form-group mb-3">
                        <label for="nama_motor">Nama Motor</label>
                        <input type="text"
                            name="nama_motor"
                            id="nama_motor"
                            class="form-control"
                            value="{{ old('nama_motor', $motor->nama_motor) }}">
                    </div>

                    
                    <div class="form-group mb-3">
                        <label for="merk">Merk</label>
                        <input type="text"
                            name="merk"
                            id="merk"
                            class="form-control"
                            value="{{ old('merk', $motor->merk) }}">
                    </div>

                    
                    <div class="form-group mb-3">
                        <label for="cc">CC</label>
                        <input type="number"
                            name="cc"
                            id="cc"
                            class="form-control"
                            value="{{ old('cc', $motor->cc) }}">
                    </div>

                    
                    <div class="form-group mb-3">
                        <label for="warna">Warna</label>
                        <input type="text"
                            name="warna"
                            id="warna"
                            class="form-control"
                            value="{{ old('warna', $motor->warna) }}">
                    </div>

                    
                    <div class="form-group mb-3">
                        <label for="stock">Stock</label>
                        <input type="number"
                            name="stock"
                            id="stock"
                            class="form-control"
                            value="{{ old('stock', $motor->stock) }}">
                    </div>

                    
                    <div class="form-group mb-3">
                        <label for="harga">Harga</label>
                        <input type="number"
                            name="harga"
                            id="harga"
                            class="form-control"
                            value="{{ old('harga', $motor->harga) }}">
                    </div>

                    
                    <div class="form-group mb-3">
                        <label>Gambar Lama</label><br>
                        @if($motor->gambar)
                        <img src="{{ asset('storage/'.$motor->gambar) }}"
                            alt="Gambar Motor"
                            width="150"
                            class="img-thumbnail mb-2">
                        @else
                        <p class="text-muted">Tidak ada gambar.</p>
                        @endif
                    </div>

                    
                    <div class="form-group mb-3">
                        <label for="gambar">Ganti Gambar (Opsional)</label>
                        <input type="file"
                            name="gambar"
                            id="gambar"
                            class="form-control">
                    </div>

                </div>

                
                <div class="card-footer" style="padding-left: 5px;">
                    <div class="d-flex justify-content-start" style="gap: 10px;">

                        
                        <button type="submit" class="btn bg-success font-weight-bold text-white">
                            Update
                        </button>

                    
                        <a href="{{ route('admin.motor.index') }}"
                            class="btn bg-danger font-weight-bold text-white">
                            Kembali
                        </a>

                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection