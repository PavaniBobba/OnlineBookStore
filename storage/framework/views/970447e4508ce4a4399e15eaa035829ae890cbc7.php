<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container">
    <div class="page-header">
            <h2>Search Books</h2>
    </div>
    <div class="jumbotron" id="filter-box">
        <div class="container">
                <div class="form-group">
                   <?php echo Form::open(array('route' => 'searching', 'class' => 'form')); ?>

		                <?php echo Form::text('text_to_search',null,
						   	array('required',
								   'class'=>'form-control',
								   'placeholder'=>'Text to Search')
						); ?>

						<?php echo Form::submit('Search By Author',
							array('class'=>'btn btn-info',
									'name'=>'search')); ?>

						<?php echo Form::submit('Search By Title',
							array('class'=>'btn btn-info',
									'name'=>'search')); ?>

					<?php echo Form::close(); ?>                  
                </div>
        </div>
    </div>
<div id="result-div"></div>