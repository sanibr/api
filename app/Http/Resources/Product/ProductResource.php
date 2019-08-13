<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductResource extends Resource
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
            'name'=>$this->name,
            'description'=>$this->detail,
            'price'=>$this->price,
            'stock'=>$this->stock,
            'discount'=>$this->discount,
            'totalPrice'=>round((1-$this->discount/100)*$this->price,2),
            'rating'=>round($this->reviews->sum('star')/$this->reviews->count(),2),
            'href'=>[
                'reviews'=>route('reviews.index',$this->id)
            ]
        ];
    }
}
