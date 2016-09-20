<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
  protected $fillable = [
        'teamname', 'domain_id','user_id','updated_at','created_at',
    ];
  
  public function domains(){
      return $this->hasMany('App\Domain','team_id');
  }

  public function user(){
  return $this->belongsToMany(User::class);  
  }
}
