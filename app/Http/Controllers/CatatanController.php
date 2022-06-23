<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;


class CatatanController extends Controller
{
    public function createCatatan(Request $request)
    {

        $nama_catatan = $request->input('nama_catatan');
        $deskripsi = $request->input('deskripsi');

        Catatan::create([
            'nama_catatan' => $nama_catatan,
            'deskripsi' => $deskripsi,
        ]);
        return $this->responseHasil(200, true, 'Create Catatan Berhasil');
    }

    public function listCatatan()
    {
        $data = Catatan::paginate(10);
        return $this->responseHasil(200, true, $data);
    }

    public function updateCatatan($id, Request $request)
    {
        $data = [
            'nama_catatan' => request('nama_catatan'),
            'deskripsi' => request('deskripsi'),
        ];

        try {
            $catatan = Catatan::find($id);
            if (empty($catatan)) {
                return $this->responseHasil(404, false, 'Data Tidak Ditermukan');
            }
            $hasil = $catatan->update($data);
            return $this->responseHasil(200, true, $hasil);
        } catch (ModelNotFoundException $e) {
            return $this->responseHasil(500, false, [
                'message' => $e->getMessage(),
                'data' => $data
            ]);
        }
    }

    public function showCatatan($id)
    {
        $a = Catatan::find($id);
        return $this->responseHasil(200, true, $a);
    }

    public function deleteCatatan($id){
        $hasil = Catatan::find($id);

        if (empty($hasil)) {
            return $this->responseHasil(404, false, 'Data tidak ditemukan');
        }
        $h = $hasil->delete();
        return $this->responseHasil(200, true, $h);
    }
}
