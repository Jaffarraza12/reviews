<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    //
    protected $table = 'warranty';
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $fillable = ['first_name','last_name','full_name','email','purchase_from','sell_price','comment'];
}
