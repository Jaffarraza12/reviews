<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    protected $table = 'answer';
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $fillable = ['answer','name','email','question'];
}
