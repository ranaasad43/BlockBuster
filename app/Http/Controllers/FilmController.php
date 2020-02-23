<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Film;

class FilmController extends ViewsComposingController
{
		public function addpage(){
			return $this->buildTemplate('addfilm');
		}
    public function store(Request $req){
    	//dd($req->all());
    	$rules = [
    		 'title' =>'min:3',
    		 'year' => 'min:4',
         'genre' => 'required',
         'studio' => 'required',
         'plot' => 'required',
    		 'poster' => 'mimes:jpeg,jpg,png',
    	];

    	$msgs = [
    		'name.min' => 'minimum three letters name'
    	];

    	$validator = Validator::make($req->all(),$rules,$msgs);
    	
    	if(!empty($validator->messages()->all())){
				$this->viewData['message_class'] = 'red-text';
				$this->viewData['errors'] = $validator->messages()->all();
				$this->viewData['message'] = 'Errors! in the form';            
				//dd($this->viewData);
				return $this->buildTemplate('addfilm');
			}    	
			//dd('clear');
      $posterdir = str_replace(' ', '',$req->get('title') );
      $posterdir = str_replace(':', '',$posterdir);
        //dd($posterdir);
      if(!is_dir(public_path('/posters'))){
				mkdir(public_path('/posters'));
			}
			if(!is_dir(public_path('/posters/'.$posterdir))){
				mkdir(public_path('/posters/'.$posterdir));
			}  			
			$postername = $req->year.$req->genre.$req->studio.".".$req->file('poster')->getClientOriginalExtension();
			$directory = public_path('/posters/'.$posterdir);
			$poster = $req->file('poster');

			$films = new Film;

			$films->title = $req->title;
			$films->year = $req->year;
			$films->genre_id = $req->genre;
			$films->studio_id = $req->studio;
			$films->plot = $req->plot;
			$films->poster = $postername;
			$films->featured = $req->featured;

			if($films->save()){
				$poster->move($directory,$postername);
				$response = [];
				$response['message_class'] = 'green-text';				
				$response['status'] = 'Film Added Successfully';
				//dd($response);            
				return redirect()->route('films')->with($response);
			}		
      

    }

    public function getfilms($req){
    	//dd($req['featured']);
    	$data = Film::when(!empty($req['genre_id']),function($q)use($req){
				return $q->where('genre_id','=',$req['genre_id'] );
			})->when(!empty($req['studio_id']),function($q)use($req){
				return $q->where('studio_id','=',$req['studio_id'] );
			})->when(!empty($req['featured']),function($q)use($req){
				return $q->where('featured','=',1);
			})->when(!empty($req['search']),function($q)use($req){
				$search_str = $req['search'];
				return $q->where('title','like',"%$search_str%");
			})->paginate(6);

			return $data;
    }
    public function showfilms(){
      $films = Film::paginate(6);
      return $films;
    }    

    public function showfilm($id){

      $film = Film::find($id);
      $this->viewData['film'] = $film;
      return $this->buildTemplate('film');
    }

    public function showAll(){
    	$films = Film::all();
    	$this->viewData['films'] = $films;
     	return $this->buildTemplate('showfilms');
    }

    public function destroy($id){
     	$film = Film::find($id);
     	if($film->delete()){
		return redirect()->route('films')->with('status','Film Deleted');		
     }
    }

    public function edit($id){
        $film = Film::find($id);
        $this->viewData['film'] = $film;
        return $this->buildTemplate('editfilm');
    }

    public function update(Request $req,$id){
        //dd($req->all());
      $rules = [
       'title' =>'min:3',
       'year' => 'min:4',
       'genre_id' => 'required',
       'studio_id' => 'required',
       'plot' => 'required',
       'poster' => 'required|mimes:jpeg,jpg,png',
      ];

      $msgs = [
          'name.min' => 'minimum three letters name'
      ];

      $validator = Validator::make($req->all(),$rules,$msgs);
      
      if(!empty($validator->messages()->all())){
          $this->viewData['message_class'] = 'red-text';
          $this->viewData['errors'] = $validator->messages()->all();
          $this->viewData['message'] = 'Errors! in the form';
          $this->viewData['film'] = $req->all();
          $this->viewData['id'] = $id;                      
          //dd($this->viewData);
          return $this->buildTemplate('editfilm');
      }       
            //dd('clear');
      $posterdir = str_replace(' ', '',$req->get('title') );
      $posterdir = str_replace(':', '',$posterdir);
        //dd($posterdir);
      if(!is_dir(public_path('/posters'))){
          mkdir(public_path('/posters'));
      }
      if(!is_dir(public_path('/posters/'.$posterdir))){
          mkdir(public_path('/posters/'.$posterdir));
      }           
      $postername = $req->year.$req->genre.$req->studio.".".$req->file('poster')->getClientOriginalExtension();
      $directory = public_path('/posters/'.$posterdir);
      $poster = $req->file('poster');

      $films = new Film;

      $films->title = $req->title;
      $films->year = $req->year;
      $films->genre_id = $req->genre_id;
      $films->studio_id = $req->studio_id;
      $films->plot = $req->plot;
      $films->poster = $postername;
      $films->featured = $req->featured;

      if($films->save()){
        $poster->move($directory,$postername);
        $response = [];
        $response['message_class'] = 'green-text';              
        $response['status'] = 'Film Updated Successfully';
        //dd($response);            
        return redirect()->route('films')->with($response);
      }
    }

    public function byGenre($id){
    	//dd($id);
    	$films = Film::when($id,function($q)use($id){
    		return $q->where('genre_id','=',$id);
    	})->get();
    	$this->viewData['films'] = $films;
    	return $this->buildTemplate('genre');
    }

    public function byStudio($id){
    	$films = Film::when($id,function($q)use($id){
    		return $q->where('studio_id','=',$id);
    	})->get();
    	$this->viewData['films'] = $films;
    	return $this->buildTemplate('studio');
    }

    public function search(Request $req){
      $films = Film::when(!empty($req['search']),function($q)use($req){
        $search_str = $req['search'];
        return $q->where('title','like',"%$search_str%");
      })->get();

      return $films;
    }


}
