<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chef extends Model
{
    use HasFactory;
    protected $fillable=['id_chef', 'name', 'posisi', 'email', 'image'];
    protected $table='chef';
    public $timestamps=false;
}
