<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tipos';
    protected $fillable = [
        'tipo'
    ];

    public function detalle(){
        return $this->hasMany(Detalle::class);
    }

}
