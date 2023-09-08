<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhpcatNewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        $return = [
            "id" => $this->id,
            "head" => $this->head,
            "date" => $this->date ];

        if( !empty($this->text) )
            $return["text"] = $this->text;

        if( !empty($this->img) )
            $return["img"] = $this->img;

        if( !empty($this->link) )
            $return["link"] = $this->link;

        return $return ;
    }
}
