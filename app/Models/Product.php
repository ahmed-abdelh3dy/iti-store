<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name' , 'description' , 'price' , 'stock' , 'slug','image'
    ];


    




    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
