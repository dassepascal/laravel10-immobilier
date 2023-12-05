<?php

namespace App\Models;

use App\Models\Option;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'surface'  ,
        'rooms' ,
        'bedrooms',
        'floor' ,
        'price' ,
        'city' ,
        'adress' ,
        'postal_code' ,
        'sold' ,

    ];

    public function options()
    {
        return $this->belongsToMany(Option::class);
    }
}
