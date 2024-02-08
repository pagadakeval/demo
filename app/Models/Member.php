<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
   protected $primaryKey = 'member_id';
   
// show one to one relationship
//    public function getGroup(){
//     return $this->hasOne('App\Models\Group','id');
//    }

public function getGroup(){
        return $this->hasMany('App\Models\Group','id','group_id');
       }
}
