@include('master')
<div class="container">
    <div class="page-header">
            <h2>Search Books</h2>
    </div>
    <div class="jumbotron" id="filter-box">
        <div class="container">
                <div class="form-group">
                   {!! Form::open(array('route' => 'searching', 'class' => 'form')) !!}
		                {!!Form::text('text_to_search',null,
						   	array('required',
								   'class'=>'form-control',
								   'placeholder'=>'Text to Search')
						)!!}
						{!!Form::submit('Search By Author',
							array('class'=>'btn btn-info',
									'name'=>'search'))!!}
						{!!Form::submit('Search By Title',
							array('class'=>'btn btn-info',
									'name'=>'search'))!!}
					{!! Form::close() !!}                  
                </div>
        </div>
    </div>
<div id="result-div"></div>