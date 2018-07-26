<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container">
<div class="panel panel-default">
<div id="log">
            <h2 > Registeration </h2>

				<?php echo Form::open(array('route' => 'registering', 'class' => 'form')); ?>

				<?php echo Form::text('username',null,
				   		array('required',
							   'class'=>'form-control',
							   'placeholder'=>'Username')
				); ?>

				<?php echo e(Form::password('pwd', array('class' => 'form-control','placeholder'=>'Password'))); ?>

				<?php echo e(Form::password('cpwd', array('class' => 'form-control','placeholder'=>'Confirm Password'))); ?>

				<?php echo Form::email('email',null,
				   array('required',
				   'class'=>'form-control',
				   'placeholder'=>'E-Mail Address')
				); ?>

				<?php echo Form::text('phonenumber',null,
				   array('required',
				   'class'=>'form-control',
				   'placeholder'=>'Phone Number')
				); ?>

				<?php echo Form::text('address',null,
				   array('required',
				   'class'=>'form-control',
				   'placeholder'=>'Address')
				); ?>

				<?php echo Form::submit('Register',
				array('class'=>'btn btn-lg btn-primary form-control')); ?>


				<?php echo Form::close(); ?>

</div>
</div>
</div>