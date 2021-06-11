<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //relación uno a uno
    public function description(){
        return $this->hasMany('App\Models\Description');
    }

    //Relación uno a muchos inversa
    public function section(){
        return $this->belongsTo('App\Models\Section');
    }

    public function platform(){
        return $this->belongsTo('App\Models\Platform');
    }

    //Relación muchos a muchos
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    //Relación uno a uno polimorfica
    public function resource(){
        return $this->morphOne('App\Models\Resource','resourceable');
    }

    //Relación uno a muchos polimorfica
    public function comments(){
        return $this->morphMany('App\Models\Comment','commentable');
    }

    public function reactions(){
        return $this->morphMany('App\Models\Reaction','reactionable');
    }

}
