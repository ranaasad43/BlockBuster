<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Film;

class CartController extends Controller{
    
    public function addToCart(Request $req,$id){
    	//dd($id);
    	$film = Film::find($id);
    	//dd($film->title);
    	if(!empty($film)){
    		Cart::add(array(
    			'id' => $film->id,
    			'name' => $film->title,
    			'quantity' => 1,
    			'price' => 20,
    			'attributes' => array()
    		));
    		return redirect()->back();
    	}else{
    		return redirect()->back();
    	}
    }
}
