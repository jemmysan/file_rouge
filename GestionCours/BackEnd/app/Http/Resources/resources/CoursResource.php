<?php

namespace App\Http\Resources\resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\resources\SessionCoursResource;

class CoursResource extends JsonResource
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
            "anne_semestre"=>AnneeSemestreResource::make($this->anneesemestre),
            "prof_module_id"=>ProfModuleResource::make($this->profModule),
            "classe_id"=>$this->classe,
            "quantum_horaire"=>$this->quantum_horaire,
            'sessions'=>SessionCoursResource::collection($this->sessions)
        ];
    }
}
