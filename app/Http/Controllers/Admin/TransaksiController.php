<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaksi;
use App\Models\Motor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf as PDF;


class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Transaksi = Transaksi::orderBy('id_transaksi', 'desc')->get();
        return view('admin.Transaksi.index', compact('Transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($jenis)
    {

        $motor = Motor::orderBy('nama_motor')->get();

        if (!in_array($jenis, ['masuk', 'keluar'])) {
            abort(404);
        }

        if ($jenis == 'masuk') {
            $judul = 'Transaksi Masuk';
        } else {
            $judul = 'Transaksi Keluar';
        }

        if ($jenis == 'masuk') {
            $view = 'admin.Transaksi.create_masuk';
        } else {
            $view = 'admin.Transaksi.create_keluar';
        }


        return view($view, [
            'motor' => $motor,
            'jenis' => $jenis,
            'judul' => $judul,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $jenis)
    {

        $request->validate([
            'id_motor' => 'required|exists:motor,id_motor',
            'qty'      => 'required|integer|min:1',
            'harga'    => ($jenis === 'keluar') ? 'required|numeric|min:0' : 'nullable',

        ]);


        $motor = Motor::findOrFail($request->id_motor);

        if ($jenis === 'masuk') {
            $harga = $motor->harga;
        } else { // 
            $harga = $request->harga;
        }

        $subtotal = $request->qty * $harga;


        $transaksi = Transaksi::create([
            'nama_motor' => $motor->nama_motor,
            'jenis' => $request->jenis,
            'id_motor' => $motor->id_motor,
            'qty' => $request->qty,
            'harga' => $harga,
            'subtotal' => $subtotal,

        ]);

        // Update stock
        $motor = Motor::findOrFail($request->id_motor);



        $motor->save();

        return redirect()->route('admin.Transaksi.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_transaksi)
    {
        $transaksi = Transaksi::findOrFail($id_transaksi);
        $motor = Motor::all();
        $jenis = $transaksi->jenis; // 

        return view('admin.Transaksi.edit', compact('transaksi', 'motor', 'jenis'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        
    
        $jenis = $request->jenis;

        $request->validate([
            'id_motor' => 'required|exists:motor,id_motor',
            'qty'      => 'required|integer|min:1',
            'harga'    => $jenis === 'keluar' ? 'required|numeric|min:0' : 'nullable',
        ]);

        
        $motorLama = Motor::findOrFail($transaksi->id_motor);

        // Kembalikan stock berdasarkan transaksi lama
        if ($transaksi->jenis === 'masuk') {
            $motorLama->stock += $transaksi->qty;
        } else if ($transaksi->jenis === 'keluar') {
            $motorLama->stock -= $transaksi->qty;
        }
        $motorLama->save();

        
        $motorBaru = Motor::findOrFail($request->id_motor);

        // Cek stok jika transaksi keluar
        if ($jenis === 'keluar' && $motorBaru->stock < $request->qty) {
            return back()->with('error', 'Stock tidak mencukupi untuk transaksi baru!');
        }

        
        $harga = $jenis === 'masuk' ? $motorBaru->harga : $request->harga;

        // Update stock motor baru
        if ($jenis === 'masuk') {
            $motorBaru->stock += $request->qty;
        } else {
            $motorBaru->stock -= $request->qty;
        }
        $motorBaru->save();

        $subtotal = $request->qty * $harga;

        // Update transaksi
        $transaksi->update([
            'id_motor'   => $request->id_motor,
            'nama_motor' => $motorBaru->nama_motor,
            'jenis'      => $jenis,
            'qty'        => $request->qty,
            'harga'      => $harga,
            'subtotal'   => $subtotal,
        ]);

        return redirect()->route('admin.Transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $motor = Motor::findOrFail($transaksi->id_motor);

        // Kembalikan stok
        if ($transaksi->jenis === 'masuk') {
            $motor->stock += $transaksi->qty;
        } else if ($transaksi->jenis === 'keluar')
            $motor->stock += $transaksi->qty; {
        }
        $motor->save();

        $transaksi->delete();

        return redirect()->route('admin.Transaksi.index');
    }

    public function cetakPDF()
    { // Ambil semua transaksi (masuk & keluar)
        $transaksi = Transaksi::orderBy('created_at', 'asc')->get();

        // Load view PDF
        $pdf = PDF::loadView('admin.transaksi.pdf', compact('transaksi'))
            ->setPaper('a4', 'landscape'); // Landscape supaya tabel panjang muat

        // Download PDF
        return $pdf->download('laporan_transaksi.pdf');
    }
}
