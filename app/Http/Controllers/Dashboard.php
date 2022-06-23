<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\CategoryModel;
use App\Models\Siswa;
use App\Models\Produk;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index() {
        $category = CategoryModel::count();
        $produk = Produk::count();
        $admin = Admin::count();
        return view('dashboard', [
        'title' => 'Dashboard Page',
        'category' => $category,
        'produk' => $produk,
        'admin' => $admin
    ]);
    }

    public function siswa() {
        return view('data_siswa' , [
            'title' => 'data siswa',
            'siswa' => Siswa::all()
        ]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'nama' => 'required',
            'kelas' => 'required'
        ]);

        Siswa::create($data);

        $siswa = Siswa::all();
        $nomor = 1;
        foreach($siswa as $item) {
            echo '
            <tr>
                <td>'.$nomor.'</td>
                <td>'.$item->nama.'</td>
                <td>'.$item->kelas.'</td>
                <td class="text-center"><button class="btn btn-primary btn-sm" onclick="edit('.$item->id.')"
                        role="button">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="hapus('.$item->id.')" role="button">Delete</button>
                </td>
            </tr>';
        $nomor++;
        } 
    }

    public function edit ($id) {
        return response()->json(Siswa::find($id));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);

        $siswa->nama = $request->input('nama');
        $siswa->kelas = $request->input('kelas');

        $siswa->update();

        // return response()->json([
        //     'status' => true
        // ]);
        $siswa = Siswa::all();
        $nomor = 1;
        foreach($siswa as $item) {
            echo '
            <tr>
                <td>'.$nomor.'</td>
                <td>'.$item->nama.'</td>
                <td>'.$item->kelas.'</td>
                <td class="text-center"><button class="btn btn-primary btn-sm" onclick="edit('.$item->id.')"
                        role="button">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="hapus('.$item->id.')" role="button">Delete</button>
                </td>
            </tr>';
        $nomor++;
        } 
        
    }

    public function delete($id) {
        $siswa = Siswa::find($id)->delete();
    }
}
