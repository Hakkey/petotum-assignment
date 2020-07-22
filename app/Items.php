<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $table = "items";

    protected $primaryKey = 'id';

    protected $fillable = [
        'row', 'column', 'styling', 'color'
    ];

    public $timestamps = false;
}
