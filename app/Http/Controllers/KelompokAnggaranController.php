<?php

namespace App\Http\Controllers;

use App\Http\Resources\KelompokAnggaranResource;
use Illuminate\Http\Request;
use App\Models\KelompokAnggaran;

class KelompokAnggaranController extends Controller
{
    public function index()
    {
        $posts = KelompokAnggaran::all();
        // return response()->json($posts);
        return KelompokAnggaranResource::collection($posts);

    }

    public function store(Request $request) 
    {   
        $validated = $request->validate([
            'Kelompok_anggaran' => 'required|max:255',
            'Deskripsi' => 'required|max:255'
        ]);
        
        $posts = KelompokAnggaran::create($request->all());
        return new KelompokAnggaranResource($posts);
    }

    public function update(Request $request, $id)   
    {   
        $validated = $request->validate([
            'Kelompok_anggaran' => 'required|max:255',
            'Deskripsi' => 'required|max:255'
    ]);

            $posts = KelompokAnggaran::findOrFail($id);
            $posts->update($request->all());

            return new KelompokAnggaranResource($posts);
    }

    public function destroy($id)   
    {   
            $posts = KelompokAnggaran::findOrFail($id);
            $posts->delete();

            return new KelompokAnggaranResource($posts);
}
    
}
