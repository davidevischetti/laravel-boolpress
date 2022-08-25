<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Slugger;

class Category extends Model
{

    // protected $table = 'categories';

    use Slugger;

    public $timestamps = false;

    public function post() {
        return $this->hasMany('App\Models\Post');
    }
}
