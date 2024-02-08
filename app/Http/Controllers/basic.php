<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class basic extends Controller
{
    public function homePage(){
        return view('layout.home');
    }
}
