<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pemesanan;
use App\Models\User;
use App\Models\Motor;
use App\Models\Transaksi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $pemesanan = Pemesanan::with('user', 'motor')->orderBy('id_pemesanan', 'desc')->get();
        return view('admin.pemesanan.index', compact('pemesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::orderBy('name')->get();
        $motor = Motor::orderBy('nama_motor')->get();

        return view('admin.pemesanan.create', compact('user', 'motor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:user,id',
            'id_motor' => 'required|exists:motor,id_motor',
            'qty' => 'required|integer|min:1',
        ]);

        // Ambil data motor
        $motor = Motor::findOrFail($request->id_motor);

        // Cek stok
        if ($motor->stock < $request->qty) {
            return back()->with('error', 'Stock tidak cukup!');
        }

        // Simpan pemesanan (otomatis ambil data motor)
        $pemesanan = Pemesanan::create([
            'id'        => $request->id,
            'id_motor'  => $request->id_motor,
            'nama_motor' => $motor->nama_motor,
            'merk'      => $motor->merk,
            'cc'        => $motor->cc,
            'warna'     => $motor->warna,
            'qty'       => $request->qty,
            'harga'     => $motor->harga,
        ]);


        $motor->stock -= $request->qty;
        $motor->save();

        return redirect()->route('admin.pemesanan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_pemesanan)
    {
        $pemesanan = Pemesanan::findOrFail($id_pemesanan);
        $user = User::all();
        $motor = Motor::all();
        return view('admin.pemesanan.edit', compact('pemesanan', 'user', 'motor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_pemesanan)
    {
        $pemesanan = Pemesanan::findOrFail($id_pemesanan);

        $request->validate([
            'id' => 'required|exists:user,id',
            'id_motor' => 'required|exists:motor,id_motor',
            'qty' => 'required|integer|min:1',
        ]);

        $motor = Motor::findOrFail($request->id_motor);

        $request->update([
            'id'        => $request->id,
            'id_motor'  => $request->id_motor,
            'nama_motor' => $motor->nama_motor,
            'merk'      => $motor->merk,
            'cc'        => $motor->cc,
            'warna'     => $motor->warna,
            'qty'       => $request->qty,
            'harga'     => $motor->harga,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_pemesanan)
    {
        $pemesanan = Pemesanan::findOrFail($id_pemesanan);
        $pemesanan->delete();

        return redirect()->route('admin.pemesanan.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
