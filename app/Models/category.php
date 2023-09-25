<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;


    public function subcategories(){

        return $this->hasMany(subcategory::class);
    }

    protected $fillable = [
        'name',
        'slug',
    ];
}
