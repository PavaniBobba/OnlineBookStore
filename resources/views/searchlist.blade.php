
@include('master')

<div class= "container">
		<table class="table">
			<tr class="active">
				<td>Title</td>
				<td>ISBN</td>
				<td>Price</td>
				<td>Requested Quantity</td>

			</tr>


<?php
$isbn=array();
$price=array();
$title=array();
$quantity=array();
if($data){
	foreach($data as $row){
		array_push($isbn, $row->ISBN);
		array_push($price, $row->price);
		array_push($title, $row->title);
	}
	}
	if($stock){
	foreach($stock as $r){
		foreach($r as $row){
		array_push($quantity, $row->count);
	}}
	}




$c=count($isbn);
echo $c;
$x=count($quantity);
echo $x;
for($i=0;$i<$c;$i++){
		if($quantity[$i]!=0){

?>
<tr>
				{!! Form::open(array('route' => 'addtocart', 'class' => 'form')) !!}

				 <td>{!!Form::text('title',$title[$i]
				)!!}</td>
				<td>{!!Form::text('isbn',$isbn[$i]
				)!!}
				 <td>$ {!!Form::text('price',$price[$i]
				)!!}</td>
				<td>{!!Form::text('stock',$quantity[$i]
				)!!}</td>
				<td>
				<select name="quantity">
				<?php 
				for($z=1;$z<=$quantity[$i];$z++){
					?>
				<option>{{$z}}</option>
				<?php	}?>
				</td>
				<td>{!!Form::submit('Add',
				array('class'=>'btn btn-primary'))!!}
</td>
				{!! Form::close() !!}
</tr>
				<?php
			}
		}

?>


