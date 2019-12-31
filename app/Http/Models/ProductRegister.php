<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ProductRegister extends Model
{
    //
    protected $table = 'product-register';
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $fillable = ['name','email','phone_number','country','state','city','zip','address','date','price','model','location'];

}
