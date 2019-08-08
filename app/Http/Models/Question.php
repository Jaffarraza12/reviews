<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $table = 'question';
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $fillable = ['question','name','email'];

}
