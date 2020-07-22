<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    protected $table = 'styles';

    protected $primaryKey = 'id';

    protected $fillable = ['name'];

    public $timestamps = false;
}
