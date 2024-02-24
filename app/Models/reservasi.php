<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservasi extends Model
{
    use HasFactory;
    protected $fillable=['no_meja', 'name','email','no_tlp','date','people','message'];
    protected $table='reservasi';
    public $timestamps=false;
}
