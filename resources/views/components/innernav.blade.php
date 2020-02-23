<div class="row">
	<div class="col m12 ">
		<nav class="amber accent-3">
		<div class="nav-wrapper">			    				      
			  {{-- <ul id="nav-mobile" class="left hide-on-med-and-down">			      	
					<li><a href="{{url('/')}}">Home</a></li>			  
					<li><a href="#">Movies</a></li>
			  </ul> --}}
			  <ul id="nav-mobile" class="right hide-on-med-and-down search-box">		      	
				<li >
					<input type="text" id="search_value" class="browser-default">
					<a id="submit_search" class="btn">Search</a>
				</li>
				@if(!empty(session()->get('admin')))
				<ul id="dropdown1" class="dropdown-content">
				  <li><a href="{{route('admin')}}">Admin Section</a></li>
				  <li><a href="{{route('films')}}">All Films</a></li>
				  <li class="divider"></li>
				</ul>				
				<li>
					<a class="dropdown-trigger btn" href="#!" data-target="dropdown1">
						Admin
						<i class="material-icons right">arrow_drop_down</i>
					</a>
				</li>
				@else
				<li><a href="{{route('admin.login')}}" class="btn">Admin login</a></li>
				@endif
						        
			  </ul>       
			  @if(empty(session()->get('userData')))			       
				  <ul id="nav-mobile" class="left hide-on-med-and-down">
					<li><a href="{{url('/register')}}" class="btn">Register</a></li>
					<li><a href="{{url('/login')}}" class="btn">Login</a></li>
				  </ul>
			  @else
					<ul id="nav-mobile" class="left hide-on-med-and-down">     	
					  <li><a href="{{route('delsession')}}" class="btn">Logout</a></li>
					</ul>
				@endif
				   
		</div>
		</nav>
	</div>
</div>
