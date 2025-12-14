<?php

namespace App\Http\Controllers\Admin;



use App\Models\Motor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MotorController extends Controller
{
    /**
     * Tampilkan semua data motor
     */
    public function index()
    {
        $motor = Motor::with('user')->orderBy('id_motor', 'desc')->get();
        return view('admin.motor.index', compact('motor'));
    }

    /**
     * Form tambah motor baru
     */
    public function create()
    {
        if (auth()->user()->usertype == 'owner') {
            abort(403, 'Owner tidak bisa tambah motor');
        }
        return view('admin.motor.create');
    }

    /**
     * Simpan data motor baru ke database
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_motor' => 'required|string|max:255',
            'merk'       => 'required|string|max:255',
            'cc'         => 'required|numeric',
            'warna'      => 'required|string|max:100',
            'stock'        => 'required|integer|min:1',
            'harga'      => 'required|numeric|min:0',
            'gambar'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);


        // simpan file
        if ($request->hasFile('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('motor', 'public');
        }

        Motor::create($validatedData);

        return redirect()->route('admin.motor.index');
    }


    /**
     * Form edit motor
     */
    public function edit($id_motor)
    {
        if (auth()->user()->usertype == 'owner') {
            abort(404, 'Owner tidak bisa edit motor');
        }
        $motor = Motor::findOrFail($id_motor);
        return view('admin.motor.edit', compact('motor'));
    }

    /**
     * Update data motor
     */
    public function update(Request $request, $id_motor)
    {
        $motor = Motor::findOrFail($id_motor);

        $request->validate([
            'nama_motor' => 'required|string|max:255',
            'merk' => 'required|string|max:255',
            'cc' => 'required|numeric',
            'warna' => 'required|string|max:100',
            'stock' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();

        // Kalau ada gambar baru, hapus yang lama dan ganti
        if ($request->hasFile('gambar')) {
            if ($motor->gambar && Storage::disk('public')->exists($motor->gambar)) {
                Storage::disk('public')->delete($motor->gambar);
            }
            $path = $request->file('gambar')->store('motor', 'public');
            $data['gambar'] = $path;
        } else {
            $data['gambar'] = $motor->gambar;
        }

        $motor->update($data);

        return redirect()->route('admin.motor.index')->with('success', 'Data motor berhasil diperbarui!');
    }

    /**
     * Hapus data motor
     */
    public function destroy($id_motor)
    {

        if (auth()->user()->usertype == 'owner') {
            abort(404, 'Owner tidak bisa hapus motor');
        }
        $motor = Motor::findOrFail($id_motor);

        // Hapus gambar jika ada
        if ($motor->gambar && Storage::disk('public')->exists($motor->gambar)) {
            Storage::disk('public')->delete($motor->gambar);
        }

        $motor->delete();

        return redirect()->route('admin.motor.index')->with('success', 'Data motor berhasil dihapus!');
    }
}
