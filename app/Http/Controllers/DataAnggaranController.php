<?php

namespace App\Http\Controllers;

use App\Http\Resources\DataAnggaranResource;
use App\Models\DataAnggaran;
use Illuminate\Http\Request;
use App\Models\KelompokAnggaran;

class DataAnggaranController extends Controller
{
    public function index($id)
    {
            $posts = DataAnggaran::with('data_Anggaran:id,Kelompok_anggaran,Deskripsi')->findOrFail($id);
        


        // return response()->json($posts);
            return new DataAnggaranResource($posts);

    }


    public function store(Request $request)
    {   
        $validated = $request->validate([
            'Anggaran' => 'required|max:11',
            'Tanggal' => 'required',
            'Jenis' => 'required',
            'id' => 'required|exists:KelompokAnggaran,id' // pastikan id yang ada di tabel KelompokAnggaran
        ]);
    
        // Mendapatkan data dari request
        $data = $request->all();
    
        // Menambahkan data baru dan mengaitkannya dengan foreign key
        $newData = DataAnggaran::create($data);
    
        // Mengambil objek KelompokAnggaran yang terkait dengan foreign key yang baru ditambahkan
        $kelompokAnggaran = KelompokAnggaran::findOrFail($data['id']);
    
        // Menghubungkan data baru dengan objek KelompokAnggaran yang relevan
        $newData->kelompokAnggaran()->associate($kelompokAnggaran);
        $newData->save();
    
        // Mengembalikan koleksi DataAnggaran yang telah di-load dengan relasi kelompokAnggaran
        return new DataAnggaranResource($newData->loadMissing('kelompokAnggaran'));
    }
    


    public function update(Request $request, $id)   
    {   
        $validated = $request->validate([
            'Anggaran' => 'required|max:11',
            'Tanggal' => 'required',
            'Jenis' => 'required'
    ]);

            $posts = DataAnggaran::with('data_Anggaran:id,Kelompok_anggaran,Deskripsi')->findOrFail($id);
            $posts->update($request->all());


        // return response()->json($posts);
            return new DataAnggaranResource($posts);

    }

    public function destroy($id)   
    {   
            $posts = DataAnggaran::with('data_Anggaran:id,Kelompok_anggaran,Deskripsi')->findOrFail($id);
            $posts->delete();

            return new DataAnggaranResource($posts);
    }

}
