<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    //
    protected $table = 'complain';
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $fillable = ['name','order','type','message'];
}
