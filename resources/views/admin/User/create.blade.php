@extends('layouts.admin')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah User</h1>
</div>

<div class="row">
    <div class="col">
        <form action="" class="action">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="name">Nama</label>
                        <input type="text" name='name' id="name" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="alamat">Alamat</label>
                        <input type="text" name='alamat' id="alamat" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="number">No Hp</label>
                        <input type="numeric" name='number' id="number" class="form-control">
                    </div>
                </div>
                <div class="div card-footer">
                    <div class="d-flex justify-content-end" style="gap: 10px;">
                        <a href="{{ route('admin.user.index') }}" class="btn btn-outline-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary"> Simpan </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection