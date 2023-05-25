<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DeviceDataResource extends JsonResource
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
            "id" => $this->id,
            "filled" => $this->filled,
            "unfilled" => $this->unfilled,
            "created_at" => $this->created_at->setTimezone('Asia/Makassar')->translatedFormat('l, d F Y H:i:s'),
        ];
    }
}
