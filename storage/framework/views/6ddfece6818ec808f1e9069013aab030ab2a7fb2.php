<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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
$pricearray=array();
if($data){
	foreach($data as $row){
		array_push($isbn, $row->ISBN);
		array_push($price, $row->price);
		array_push($title, $row->title);
		array_push($quantity, $row->number);
	}
	}
	$c=count($isbn);


for($a=0;$a<$c;$a++){
		$p=$price[$a];
		$q=$quantity[$a];
		$tp=$p*$q;
		$tp=number_format($tp, 2);
		array_push($pricearray, $tp);
	}
$totalprice =array_sum($pricearray);
$totalprice=number_format($totalprice, 2);



        
for($i=0;$i<$c;$i++){

?>
<tr>

				<td><?php echo $title[$i]?></td>
				<td><?php echo $isbn[$i]?></td>
				<td>$ <?php echo $price[$i]?></td>
				<td><?php echo $quantity[$i]?></td>
				

</tr>
				<?php
			}
/*		}*/

?>
<tr><td colspan="5"><strong>Total Price of the Cart : $ <?php echo $totalprice?></strong></td></tr>
<tr>
<td><a type="button" class="btn btn-primary" href="<?php echo e(url('/buy')); ?>">Buy</a></td>
</tr>
</table>
</div>