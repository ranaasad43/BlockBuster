<div class="col m9">
	<div class="heading">
		<h5 class="z-depth-2">Registration</h5>
    
	</div>
	<div class="container form-container">
		<form class="col s12" method="post" action="{{route('register')}}" enctype="multipart/form-data">
      @csrf
    <div class="row">
      <div class="input-field ">
        <input  name="name" type="text" >
        <label for="name">Name :</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field ">
        <input  name="user_name" type="text" >
        <label for="user_name">User Name :</label>
      </div>
    </div>
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
      <div class="input-field ">
        <input  name="retype_password" type="password" >
        <label for="retype_password">Retype Password :</label>
      </div>
    </div>
    <div class="row">
        <div >
          <label>Gender:</label>
          <select class="browser-default" name="gender">
            <option value="" disabled selected>gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>            
          </select>          
        </div>
      </div>    
    <div class="row">
      <div>
        <label for="birthday">Birthday:</label>
        <input type="date" name="birthday">
      </div>
    </div>    
    <div class="">
      <label>Select Country:</label>
     <select class="browser-default" name="country">     
      <option value="pak">Pakistan</option>
      <option value="in">India</option>
      <option value="us">United States</option>
    </select>    
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