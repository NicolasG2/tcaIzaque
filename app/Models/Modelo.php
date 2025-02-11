<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'marca_id'];

    public function carros()
    {
        return $this->hasMany('App\Models\Carro');  
    }

    public function marca()
    {
        return $this->belongsTo('App\Models\Marca');  
    }
}
