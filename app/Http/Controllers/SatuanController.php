<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        $satuans = Satuan::all();
        return view('satuan.index', compact('satuans'));
    }

    public function create()
    {
        return view('satuan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        Satuan::create($request->all());

        return redirect()->route('satuan.index');
    }

    public function show(Satuan $satuan)
    {
        return view('satuan.show', compact('satuan'));
    }

    public function edit(Satuan $satuan)
    {
        return view('satuan.edit', compact('satuan'));
    }

    public function update(Request $request, Satuan $satuan)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $satuan->update($request->all());

        return redirect()->route('satuan.index');
    }

    public function destroy(Satuan $satuan)
    {
        $satuan->delete();

        return redirect()->route('satuan.index');
    }
}
