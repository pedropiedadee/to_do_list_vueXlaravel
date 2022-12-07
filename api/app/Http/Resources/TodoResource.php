<?php

namespace App\Http\Resources;

use App\TodoTask;
use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (integer)$this->id,
            'label' => (string)$this->label,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
            'tasks' =>  TodoTaskResource::collection($this->whenLoaded('tasks'))
        ];
    }
}
