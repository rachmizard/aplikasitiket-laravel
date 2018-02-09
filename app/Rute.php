<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    protected $table = 'rute'; // the name of table.
    public $timestamps = false; // ga adain timestamps
    protected $primarykey = 'id'; // id dari table
    public $incremening = false;
    protected $fillable = ['depart_at', 'rute_from', 'rute_to', 'price', 'transportation_id'];


 public function reservation()
    {
    	return $this->hasMany('App\Reservation', 'id');
    }

 public function transportation()
    {
        return $this->belongsTo('App\Transportation', 'transportation_id', 'id');    	
    }

}
