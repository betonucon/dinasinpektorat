<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pkpt extends Model
{
    use HasFactory;
    protected $table='pkpt';
    protected $guarded=['id_pkpt'];

    public $timestamps = false;
}
