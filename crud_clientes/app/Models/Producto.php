<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    public $table = 'productos';
     protected $fillable = [
    	'id',
    	'nombre',
    	'descripcion',
    	'marca',
    	'stock',
    	'precio',
    	'iva',
    	'stock_min',
        'estado'	
    ];
}
