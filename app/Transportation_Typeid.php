<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportation_Typeid extends Model
{
    protected $table = 'transportation_type'; // the name of table.
    public $timestamps = false; // ga adain timestamps
    protected $primarykey = 'id'; // id dari table
    public $incremening = false;
}
