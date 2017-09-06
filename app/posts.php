<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\thread;

class posts extends Model
{
 
    protected $fillable = ['title','comment','image'];


    public function thread()
    {

        return $this->belongsTo(thread::class);

    }


}
