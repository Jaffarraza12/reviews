<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $table = 'contact';
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $fillable = ['name','email','question','phone_number','concerning','message'];
}
