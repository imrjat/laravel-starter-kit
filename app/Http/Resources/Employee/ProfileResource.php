<?php

namespace App\Http\Resources\Employee;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{

    
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    
    public function toArray($request)
    {

        	
        return [
            'name' => $this->name,
            'email' => $this->email,
            'work_email' => $this->work_email,
            'mobile' => $this->mobile,
            'avatar'=>$this->avatar,
            'active_company'=>$this->active_company->name ?? null,
            'department'=>$this->department->name ?? null,
            'designation'=>$this->designation->name ?? null,
            'social_links'=>SociallinkResource::collection($this->social_links) ?? null,
            'hobbies'=>$this->hobbies->pluck('name')??null,
            'skills'=>$this->skills->pluck('name')??null,
        ];
    }

}
