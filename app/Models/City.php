<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'cost', 'department_id'];

    //Relación uno a muchos
    public function districts(){
        return $this->hasMany(District::class);
    }

    public function orders(){
        return $this->hasMany(Orders::class);
    }

}
