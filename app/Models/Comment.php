<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function commentable(){
        return $this->morphTo();
    }

    //relacion uno a muchos inversa
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //relación uno a muchos polimorfica

    public function Comments(){
        return $this->morphMany('App\Models\Comment','commentable');
    }

    public function Reactions(){
        return $this->morphMany('App\Models\Reaction','reactionable');
    }

}
