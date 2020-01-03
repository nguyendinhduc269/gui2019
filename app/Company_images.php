<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company_images extends Model
{
    //
     protected $table = 'company_images';

     protected $fillable = ['image', 'infor_id'];

     public $timestamp = false;
}
