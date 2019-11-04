<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Retailer extends Model
{
    //
    protected $table = 'complain';
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $fillable = ['company_name','name','email','message','phone_number','sell'];
}
