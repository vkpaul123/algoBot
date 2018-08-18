<?php
 
namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Robot extends Model
{
    public function isOnline()
    {
    	return ($this->updated_at > Carbon::now()->subMinutes(5)) ? true : false;
    }

    public function traversal()
    {
    	return $this->hasMany(Traversal::class);
    }

    public function obstacles()
    {
    	return $this->hasMany(Obstacle::class);
    }
}
