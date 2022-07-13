<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;

class Category extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category', [
            'category' => CategoryModel::all(), 
            'title' => 'Category List',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-category', [
            'title' => 'Create Category'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_kategori' => 'required|unique:category'
        ]);

        CategoryModel::create($data);

        return redirect('category')->with('berhasil', 'Kategori Baru Sudah Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getProduk($id)
    {
        $category = CategoryModel::find($id);
        return view('category-produk', [
            'title' => 'list Product',
            'produk' => $category->product, 
            'kategori' => $category->nama_kategori
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = CategoryModel::find($id);
        return view('edit-category', [
            'category'=> $category,
            'title' => 'Edit Category'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = CategoryModel::find($id);

        $category->nama_kategori = $request->input('nama_kategori');

        $category->save();

        return redirect('category')->with('berhasil', 'Kategori Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = CategoryModel::find($id)->delete();

        return redirect('category')->with('berhasil', 'kategori sudah dihapus');
    }
}
