<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sermina extends Model
{
    //
    protected $table = 'sermina';

    protected $fillable = ['serminaName','teacherName'];
}
