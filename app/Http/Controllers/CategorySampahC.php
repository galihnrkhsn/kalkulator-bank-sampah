<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\History;

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
            'category' => Category::where('status', Category::STATUS_AKTIF)->get(),
        ]);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->status= Category::STATUS_NONAKTIF;
        $category->save();
        return redirect()->back();
    }

    public function post(Request $request)
    {

        $category = [
            "nama" => $request['nama'],
            "berat_kg" => $request['harga_kg'],
        ];

        if ($category['berat_kg'] < 0) {
            return redirect()->back();
        }
        $harga = Category::where('id', $category['nama'])->first();

        $total = (int) $harga->harga_kg * $category['berat_kg'];
        // dd($harga);
        $category = History::create([
            'total' => (string) $total,
            'category_id' => $harga->id,
        ]);
        return response()->json([
            "message" => "succes",
            "data" => $total
        ]);
    }

    public function tambah_sampah(Request $req){
        $category = Category::where('id', $req['id'])->first();
        return view('sampah.tambah', compact('category'));
    }

    public function store(Request $req)
    {
        if (isset($req['id']) && $req['id']!= null ) {
            $category = Category::where('id', $req['id'])->first();
            $category->nama=$req['nama'];
            $category->harga_kg=$req['harga_kg'];
            $category->save();
        } else {
            Category::create([
                'nama' => $req['nama'],
                'harga_kg' => $req['harga_kg'],
            ]);
        }
        return redirect()->route('edit_sampah');
    }
}
