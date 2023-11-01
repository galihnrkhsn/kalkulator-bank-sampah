<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategorySampahC extends Controller
{
    public function sampah()
    {
        return view('sampah.index', [
            'category' => Category::all(),
        ]);
    }

    public function edit_sampah()
    {
        return view('sampah.edit', [
            'category' => Category::all(),
        ]);
    }

    public function edited()
    {
        return view('sampah.edited');
    }

    public function update($id ,Request $request)
    {
    $category->nama = $request->input('nama');
    $category->harga_kg = $request->input('harga_kg');
    $category->save();
    return redirect()->route('edit')->with('success', 'Data berhasil diperbarui.');;
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category');
    }

    public function post(Request $request)
    {
        $category = [
            "nama" => $request['nama'],
            "berat_kg" => $request['harga_kg'],
        ];
        $harga = Category::where('id', $category['nama'])->first();

        $harga = (int) $harga->harga_kg * $category['berat_kg'];

        return response()->json([
            "message" => "succes",
            "data" => $harga
        ]);
    }
}
