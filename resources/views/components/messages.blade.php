@php
	//dd($errors);
@endphp
<div class="heading">	
	<p class="message-box {{!empty(session('message_class')) ? session('message_class') : 'red-text'}}">
	  {{!empty($message) ? $message : ''}}
	  {{!empty(session('status')) ? session('status') : ''}}
	</p>
	<ul>
		@if(!empty($errors) && count($errors) > 0)
		  @foreach($errors as $error)
			<li class="red-text center-align">{{$error}}</li>
		  @endforeach
		@endif  
	</ul>	
</div>