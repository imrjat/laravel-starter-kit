<?php

namespace App\Http\Resources\Skill;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SkillCollection extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
 
    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function with($request)
    {


        return [
            'success'=>true,
            'message'=>'Skills fetched successfully',
        ];
    }



}
