<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'user_id','address', 'phone', 'birth'
    ];
    protected $table = 'users_details';

    public function user() {
        //return $this->hasOne('App\Models\UserDetails'); //NELLA TABELLA CHE NON HA IL FOREIGN KEY
        return $this->belongsTo('App\Models\User'); //NELLA TABELLA CON IL FOREIGN KEY
    }
}
