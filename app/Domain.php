<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cache;
use Carbon\Carbon;
class Domain extends Model
{

  protected $fillable = [
       'groupname', 'domain_name', 'domain_register','domian_style','domain_price','domain_status','beian_status', 'domain_use','dead_time','team_content','last_user_id','team_id',
    ];

  public function teams(){
  return $this->belongsTo('App\Team');  
  }
  
  public function domains(){
    $domainList=Domain::paginate(12);
    $expiresAt = Carbon::now()->addMinutes(1);
    
    Cache::put('domainList',$domainList,$expiresAt);
    return $domainList;
  }
  
  public function getDomainList(){
    //判断是否有缓存
    if(Cache::has('domainList')){
      $domainList=Cache::get('domainList');
       return $domainList;
    }else{
      return $this->domains();
    }
  }
}
