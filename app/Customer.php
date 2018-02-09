<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer'; // the name of table.
    public $timestamps = false; // ga adain timestamps
    protected $primarykey = 'id'; // id dari table
    public $incremening = false;
    protected $fillable = ['name', 'addres', 'phone', 'gender'];

    public function reservation()
    {
    	return $this->hasMany('App\Reservation', 'id');
    }

}
