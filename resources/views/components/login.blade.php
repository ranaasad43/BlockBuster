<div class="col m12 ">
  <div class="heading">
  	<h5 class="z-depth-2">Login Here</h5>    	
  </div>
	<div class="container form-container">
	<form class="col s12" method="post" action="{{route('login')}}" enctype="multipart/form-data">
  @csrf 
  <div class="row">
    <div class="input-field ">
      <input  name="email" type="email" >
      <label for="email">Email :</label>
    </div>
  </div>
  <div class="row">
    <div class="input-field ">
      <input  name="password" type="password" >
      <label for="password">Password :</label>
    </div>
  </div>
  <div class="row">
   <div class="col s12">          
    <div class="input-field col s12">
     <button type="submit" class="btn-large">Enter</button>
    </div>
   </div>
  </div>
  </form>
<div class="clearfix"></div>      
    
</div>
</div>