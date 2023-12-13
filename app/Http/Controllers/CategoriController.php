<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriController extends Controller
{
    public function index()
    {
        $kategori = Category::all();
        return view('/kategori', ['kategori' => $kategori]);
    }

    public function show()
    {
        return view('add-kategori');
    }

    // add data
    public function proses_kategori(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'unique:categories', 'min:4', 'max:50'],
        ]);

        $dataProses = Category::create($request->all());
        return redirect('/kategori')->with('status', 'Berhasil tambah data : ' . $dataProses->name);
    }

    public function edit_kategori($slug)
    {
        $dataKtgr = Category::where('slug', $slug)->first();
        return view('edit-kategori', ['dataKtgr' => $dataKtgr]);
    }

    public function proses_edit_ktgr(Request $request, $slug)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'unique:categories', 'min:5', 'max:50'],
        ]);

        $dataEdit = Category::where('slug', $slug)->first();
        $dataEdit->slug = null;
        $dataEdit->update($request->all());
        return redirect('/kategori')->with('status', 'Berhasil edit data : ' . $dataEdit->name);
    }

    public function delete_data($slug)
    {
        $dataDelete = Category::where('slug', $slug)->first();
        return view('kategori-del', ['dataDelete' => $dataDelete]);
    }

    public function destroy_data($slug)
    {
        $dataDelete = Category::where('slug', $slug)->first();
        $dataDelete->delete();

        return redirect('/kategori')->with('status', 'Berhasil hapus data : ' . $dataDelete->name);
    }

    public function show_kategori_restore()
    {
        $dataRecycle = Category::onlyTrashed()->get();
        return view('show-kategori-restore', ['data' => $dataRecycle]);
    }

    public function restore_kategori($slug)
    {
        $dataRestore = Category::withTrashed()->where('slug', $slug)->first();
        $dataRestore->restore();
        return redirect('/kategori')->with('status', 'Berhasil restore data');
    }

    public function fix_deleted_kategori($slug)
    {
        $dataFix = Category::withTrashed()->where('slug', $slug)->first();
        $dataFix->forceDelete();
        return redirect('/kategori')->with('status', 'Berhasil deleted permanent data : ' . $dataFix->name);
    }
}
