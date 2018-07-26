@include('master')
<div class="container">
<div class="panel panel-default">
<div id="log">
            <h2 > Registeration </h2>

				{!! Form::open(array('route' => 'registering', 'class' => 'form')) !!}
				{!!Form::text('username',null,
				   		array('required',
							   'class'=>'form-control',
							   'placeholder'=>'Username')
				)!!}
				{{ Form::password('pwd', array('class' => 'form-control','placeholder'=>'Password')) }}
				{{ Form::password('cpwd', array('class' => 'form-control','placeholder'=>'Confirm Password')) }}
				{!!Form::email('email',null,
				   array('required',
				   'class'=>'form-control',
				   'placeholder'=>'E-Mail Address')
				)!!}
				{!!Form::text('phonenumber',null,
				   array('required',
				   'class'=>'form-control',
				   'placeholder'=>'Phone Number')
				)!!}
				{!!Form::text('address',null,
				   array('required',
				   'class'=>'form-control',
				   'placeholder'=>'Address')
				)!!}
				{!!Form::submit('Register',
				array('class'=>'btn btn-lg btn-primary form-control'))!!}

				{!! Form::close() !!}
</div>
</div>
</div>