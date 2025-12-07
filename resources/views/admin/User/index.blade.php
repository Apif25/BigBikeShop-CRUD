@extends('layouts.admin')
@section('content')

<h1 class="h3 mb-4 text-gray-800">Data User</h1>

<div class="card shadow mb-4">
    <div class="card-body">
        <p>Selamat datang, <b>{{ Auth::user()->name }}</b>
            pada halaman dashboard BigBike Shop dengan hak akses yang anda miliki sebagai
            <b>
                @if (Auth::user()->usertype == 'admin')
                Admin
                @elseif(Auth::user()->usertype == 'user')
                User
                @endif
            </b>
        </p>
    </div>
</div>


<!-- Tabel Data -->
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>Id User</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->usertype }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td>
                                <div class="d-flex">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('admin.user.edit', $item->id) }}" class="btn btn-sm btn-warning mr-2">
                                        <i class="fas fa-pen"></i>
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('admin.user.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus user ini?')">
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