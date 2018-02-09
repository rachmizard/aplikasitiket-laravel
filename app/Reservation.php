<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservation'; // the name of table.
    public $timestamps = false; // ga adain timestamps
    protected $primarykey = 'id'; // id dari table
    public $incremening = false; 
    protected $fillable = ['reservation_code','reservation_at','reservation_date','customer_id','seat_code','rute_id','depart_at','price','user_id'];

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id', 'id');    	
    }

    public function rute()
    {
        return $this->belongsTo('App\Rute', 'rute_id', 'id');    	
    }

}
