<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Studio;

class StudioController extends Controller
{
    public function getStudios(){
        $response = array();
        $data = Studio::get();        
        
        return $data; 
    }
}
