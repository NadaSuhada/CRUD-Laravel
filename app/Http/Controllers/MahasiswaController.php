<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'nama' => 'required|max:100',
            'prodi' => 'required|max:100',
            'alamat' => 'required|max:100'
        ]);

        if($validator->fails()) {
            return response()->json($validator->messages())->setStatusCode(422);
        }
        $validated = $validator->validated();

        Mahasiswa::create([
            'nama' => $validated['nama'],
            'prodi' => $validated['prodi'],
            'alamat' => $validated['alamat']
        ]);

        return response()->json('mahasiswa berhasil disimpan')->setStatusCode(201);

    }

    public function show(){
        $mahasiswas = mahasiswa::all();

        return response()->json($mahasiswas)->setStatusCode(200);
    }
    public function update (Request $request,$id) {
        $validator = Validator::make($request->all(),[
            'nama' => 'required|max:100',
            'prodi' => 'required|max:100',
            'alamat' => 'required|max:100'
        ]);

        if($validator->fails()) {
            return response()->json($validator->messages())->setStatusCode(422);
        }

        $validated = $validator->validated();

        Mahasiswa::where('id',$id)->update([
            'nama' => $validated['nama'],
            'prodi' => $validated['prodi'],
            'alamat' => $validated['alamat']
        ]);

        return response()->json(['messages'=>'Data berhasil diubah'],201);
    }

    public function delete($id) {

        $mahasiswa = Mahasiswa::where('id',$id)->get();
        
        if($mahasiswa){
            Mahasiswa::where('id',$id)->delete();

            return response()->json([
                'messages'=>'Data mahasiswa dengan ID: '.$id.' Berhasil dihapus'
            ],200);
        }

        return response()->json([
            'messages'=>'Data mahasiswa dengan ID: '.$id.' Tidak ditemukan'
        ],404);
    }
}