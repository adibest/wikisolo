<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Role extends JsonResource
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
          'id' => $this->id,
          'name' => $this->name,
        ];
    }

    public function with($request)
    {
        return [
           'version' => '1.0.0',
           'api_url' => url('http://localhost:8000/api')
        ];
    }

    public function withResponse($request, $response)
    {
        $response->header('X-Value', 'True');
    }
}
