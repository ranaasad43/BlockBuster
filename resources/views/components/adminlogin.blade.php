
<div class="col m12 ">
	<div class="heading">
		<h5 class="z-depth-2">Admin Login</h5>    
    </ul>	
	</div>
	<div class="container form-container">
     <form class="col s12" method="post" action="{{route('admin.section')}}" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="input-field ">
          <input  name="name" type="text" >
          <label for="name">Name :</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field">
          <input type="email" name="email">
          <label for="email">Email :</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field">
          <input type="password" name="password">
          <label for="password">Password :</label>
        </div>
      </div>
      <div class="row">
        <div class="col s12">          
          <div class="input-field col s12">
            <button type="submit" class="btn-large">Login</button>
          </div>
        </div>
      </div>
    </form>
    <div class="clearfix"></div>
  </div>  
</div>