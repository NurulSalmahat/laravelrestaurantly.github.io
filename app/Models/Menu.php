<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable=['id_menu', 'menu', 'deskripsi', 'harga', 'image'];
    protected $table='menu1';
    public $timestamps=false;
}
