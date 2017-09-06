<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\posts; 

class thread extends Model
{
 
    protected $table = 'threads';
    protected $fillable = ['title','comment','image'];

    public function posts()
    {

        return $this->hasMany(posts::class);

    }
    

}
