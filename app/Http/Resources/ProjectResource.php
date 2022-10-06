<?php

namespace App\Http\Resources;

use App\Models\User;
use App\Models\ProjectCategory;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'id'=>$this->id,
            'user_id'=>$this->user_id,
            'title'=>$this->title,
            'description'=>$this->description,
            'instruction'=>$this->instruction,
            'url'=>$this->url,
            'category'=>ProjectCategory::with('category')->where('project_id',$this->id)->get(),
            'user'=>User::find($this->user_id),
        ];
    }
}
