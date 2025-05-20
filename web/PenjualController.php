<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penjual;

class PenjualController extends Controller
{
    public function index()
    {
        $penjuals = Penjual::all();
        return view('penjual.index', compact('penjuals'));
    }

    public function create()
    {
        return view('penjual.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:penjuals,email',
            'alamat' => 'nullable|string|max:255',
        ]);

        Penjual::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('penjual.index')->with('success', 'Penjual berhasil ditambahkan');
    }

    public function show($id)
    {
        $penjual = Penjual::findOrFail($id);
        return view('penjual.show', compact('penjual'));
    }

    public function edit($id)
    {
        $penjual = Penjual::findOrFail($id);
        return view('penjual.edit', compact('penjual'));
    }

    public function update(Request $request, $id)
    {
        $penjual = Penjual::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:penjuals,email,' . $penjual->id,
            'alamat' => 'nullable|string|max:255',
        ]);

        $penjual->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('penjual.index')->with('success', 'Penjual berhasil diupdate');
    }

    public function destroy($id)
    {
        $penjual = Penjual::findOrFail($id);
        $penjual->delete();

        return redirect()->route('penjual.index')->with('success', 'Penjual berhasil dihapus');
    }
}
