<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    protected $table = 'transportation'; // the name of table.
    public $timestamps = false; // ga adain timestamps
    protected $primarykey = 'id'; // id dari table
    public $incremening = false;
    protected $fillable = ['code', 'description', 'seat_qty', 'transportation_typeid'];


 public function rute()
    {
    	return $this->hasMany('App\Rute', 'id');
    }


}
