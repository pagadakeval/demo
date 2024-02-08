<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;

class memberController extends Controller
{
    //one to many relationship
    // function group(){
    //    return Member::with('getGroup')->get();
    // }

    //rout model biding
    function group2(Member $id){
        return $id;
    }
}
