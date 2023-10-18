<?php

namespace App\Http\Resources\resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SessionCoursResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'cours_id'=>$this->cours_id,
            'salle_id'=>$this->salle,
            'type_session'=>$this->type_session,
            'date'=>$this->date,
            'heure_debut'=>$this->heure_debut,
            'heure_fin'=>$this->heure_fin
        ];
    }
}
