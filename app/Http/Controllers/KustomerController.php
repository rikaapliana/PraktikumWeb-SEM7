<?php

namespace App\Http\Controllers;

use App\Models\Kustomer;
use Illuminate\Http\Request;

class KustomerController extends Controller
{
    // Menampilkan daftar kustomer
    public function index()
    {
        $kustomers = Kustomer::all(); // Ambil semua data kustomer
        return view('kustomer.index', compact('kustomers'));
    }

    // Menampilkan form untuk menambahkan kustomer baru
    public function create()
    {
        return view('kustomer.create');
    }

    // Menyimpan data kustomer baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:kustomers',
            'name' => 'required',
            'telpon' => 'required',
            'email' => 'required|email|unique:kustomers',
            'alamat' => 'required',
        ]);

        Kustomer::create($request->all()); // Simpan data ke database

        return redirect()->route('kustomer.index')->with('success', 'Kustomer berhasil ditambahkan.');
    }

    // Menampilkan detail kustomer
    public function show(Kustomer $kustomer)
    {
        return view('kustomer.show', compact('kustomer'));
    }

    // Menampilkan form untuk mengedit data kustomer
    public function edit(Kustomer $kustomer)
    {
        return view('kustomer.edit', compact('kustomer'));
    }

    // Memperbarui data kustomer di database
    public function update(Request $request, Kustomer $kustomer)
    {
        $request->validate([
            'nik' => 'required|unique:kustomers,nik,' . $kustomer->id,
            'name' => 'required',
            'telpon' => 'required',
            'email' => 'required|email|unique:kustomers,email,' . $kustomer->id,
            'alamat' => 'required',
        ]);

        $kustomer->update($request->all()); // Perbarui data

        return redirect()->route('kustomer.index')->with('success', 'Kustomer berhasil diperbarui.');
    }

    // Menghapus data kustomer dari database
    public function destroy(Kustomer $kustomer)
    {
        $kustomer->delete();

        return redirect()->route('kustomer.index')->with('success', 'Kustomer berhasil dihapus.');
    }
}
