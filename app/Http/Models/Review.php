<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $table = 'review';
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $fillable = ['title','review','name','quality_vote','performance_vote','features_vote','vote','email','status','recommend','product'];

}
