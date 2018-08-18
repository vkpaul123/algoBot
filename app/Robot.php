<?php
 
namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Robot extends Model
{
    public function isOnline()
    {
    	return ($this->updated_at > Carbon::now()->subMinutes(15)) ? true : false;
    }
}
