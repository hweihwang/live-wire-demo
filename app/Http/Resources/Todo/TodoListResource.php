<?php

namespace App\Http\Resources\Todo;

use App\Http\Resources\BaseResource;

class TodoListResource extends BaseResource
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
            'id' => $this->id,
            'content' => $this->content,
            'is_done' => $this->is_done,
        ];
    }
}
