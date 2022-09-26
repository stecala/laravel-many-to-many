<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['user_id','description', 'post_date'];

    public function user(){
    
        return $this->belongsTo('App\User');
    }

   public function tags(){
        return $this->BelongsToMany('App\Models\Tag');
    }
}
