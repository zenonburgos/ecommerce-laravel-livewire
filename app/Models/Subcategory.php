<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    //En este caso con guarded se especifican los campos que no se rellenarán por asignación masiva de datos
    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Relación uno a muchos
    public function products(){
        return $this->hasMany(Product::class);
    }

    //Relación uno a muchos inversa
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
