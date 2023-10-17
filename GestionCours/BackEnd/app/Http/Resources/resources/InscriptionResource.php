<?php

namespace App\Http\Resources\resources;

use Illuminate\Http\Request;
use App\Http\Resources\resources\ClasseResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\resources\UserResource;

class InscriptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'classe'=>$this->classe,
            'etudiant'=>$this->etudiant
        ];
    }
}
