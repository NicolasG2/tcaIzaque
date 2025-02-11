<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    use HasFactory;

    protected $fillable = ['placa', 'modelo_id', 'estado_id', 'cor_id'];

    public function cor()
    {
        return $this->belongsTo('App\Models\Cor');  
    }

    public function modelo()
    {
        return $this->belongsTo('App\Models\Modelo');
    }

    public function estado()
    {
        return $this->belongsTo('App\Models\Estado');
    }
}
