<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opd extends Model
{
    use HasFactory;
    protected $table='m_opd';
    protected $guarded=['id'];

    public $timestamps = false;
}