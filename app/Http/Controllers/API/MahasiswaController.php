<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MahasiswaController extends Controller
{
    public function index(){
        $mahasiswa = Mahasiswa::with('prodi.fakultas')->get();
        return response()->json($mahasiswa, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            "npm" => "required|unique:mahasiswas",
            "nama" => "required",
            "tempat_lahir" => "required",
            "tanggal_lahir" => "required",
            "prodi_id" => "required",
            "foto" => "required|image"
        ]);

        // ambil extensi file foto
        $ext = $request->foto->getClientOriginalExtension();
        // rename file foto menjadi npm.extensi (Contoh: 2125250001.jpg)
        $validasi["foto"] = $request->npm.".".$ext;
        // upload file foto ke dalam folder public/foto
        $request->foto->move(public_path('foto'), $validasi["foto"]);
        // simpan data mahasiswa ke tabel mahasiswas
        Mahasiswa::create($validasi);
        $response['success'] = true;
        $response['message'] = 'Mahasiswa '. $request->nama.' berhasil disimpan';
        return response()->json($response, Response::HTTP_CREATED);
    }
}
