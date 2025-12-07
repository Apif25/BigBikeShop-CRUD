@extends('layouts.admin')
@section('content')

<h1 class="h3 mb-4 text-gray-800">Dashboard Admin</h1>

<div class="card shadow mb-4">
    <div class="card-body">
        <p>Selamat datang, <b> {{ Auth::user()->name }}</b>
            pada halaman dashboard BigBike Shop dengan hak akses yang anda miliki sebagai
            <b>
                @if (Auth::user() -> usertype == 'admin')
                Admin
                @elseif(Auth::user() -> usertype == 'user')
                User
                @endif
            </b>
        </p>
    </div>
</div>
@endsection