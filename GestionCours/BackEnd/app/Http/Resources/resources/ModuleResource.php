<?php

namespace App\Http\Resources\resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ModuleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // $profs = User::where('role','Prof')->get();
        return [
            'id'=>$this->id,
            'libelle'=>$this->libelle,
            'profs'=>$this->profs
        ];
    }
}
