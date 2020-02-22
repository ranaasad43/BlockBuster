@php
  $id = !empty($film['id']) ? $film['id'] : $id;
  //dd($film['genre_id']);
  //$genre = !empty($film['genre_id']) ? $film['genre_id'] : $film['genre'];
  //$genre = !empty($film['genre_id']) ? $film['genre_id'] : $film['studio'];
@endphp
<div class="col m9">
	<div class="heading">
		<h5 class="z-depth-2">Edit Film</h5>    	
	</div>
	<div class="container form-container">
		 <form class="col s12" method="post" action="{{url('/updatefilm/'.$id)}}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="input-field ">
          <input  name="title" type="text" value="{{$film['title']}}" >
          <label for="title" >Film title :</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field">
          <input type="number" name="year" min="1900" max="3000" value="{{$film['year']}}">
          <label for="year">Release Year :</label>
        </div>
      </div>
      <div class="row">
        <div >
          <label>Select Genre :</label>
          <select class="browser-default" name="genre_id" >
            <option value="{{$film['genre_id']}}"  selected>Genre</option>
            <option value="1">Horror</option>
            <option value="2">Comedy</option>
            <option value="3">Scifi</option>
            <option value="4">Action</option>
            <option value="5">Fantasy</option>
            <option value="6">Mystery</option>
          </select>          
        </div>
      </div>      
      <div class="row">
        <div >
          <label>Studio :</label>
          <select class="browser-default" name="studio_id">
            <option value="{{$film['studio_id']}}" selected>Studio</option>
            <option value="1">Marvel Studio</option>
            <option value="2">Disney</option>
            <option value="3">Netflix</option>
            <option value="4">WernerBros</option>
            <option value="5">Universal</option>
            <option value="6">DC Comics</option>
            <option value="7">Lucasfilms</option>
          </select>          
        </div>
      </div>
      <div class="row">
        <div class="col s12">          
          <div class="input-field col s12">
            <textarea name="plot" class="materialize-textarea" >{{$film['plot']}}</textarea>
            <label for="plot">Plot :</label>
          </div>
        </div>
      </div>
      <div class="row">
        <div >
          <label>Featured:</label>
          <select class="browser-default" name="featured">
            <option value="{{$film['featured']}}"  selected>feature</option>
            <option value="0">No</option>
            <option value="1">Yes</option>            
          </select>          
        </div>
      </div>      
      {{-- <div class="file-field input-field">        
        <input type="hidden" name="poster" value="{{$film->poster}}">            
      </div> --}}
      <div class="file-field input-field">
      <div class="btn">
        <span>Poster</span>
        <input type="file" name="poster">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
    <div class="row">
        <div class="col s12">          
          <div class="input-field col s12">
            <button type="submit" class="btn-large">Add</button>
          </div>
        </div>
      </div>
    </form>
    <div class="clearfix"></div>    
     
    	
	</div>
 	
</div>