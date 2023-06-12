<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'detalles';
    protected $fillable = [
        'tipo_id',
        'description'
    ];

    public function tipo(){
        return $this->belongsTo(Tipo::class);
    }

}
