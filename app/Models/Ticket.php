<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $fillable = ['titulo','descripcion','user_id','estado'];
    public $timestamps = true;
}
