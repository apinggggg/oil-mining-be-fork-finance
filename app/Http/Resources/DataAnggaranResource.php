<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DataAnggaranResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    { 
        return [
            'Anggaran' => $this->Anggaran,
            'Tanggal' => $this->Tanggal,
            'Jenis' => $this->Jenis,
            'Data Anggaran' => $this->data_Anggaran
        

        ];
    }
}
