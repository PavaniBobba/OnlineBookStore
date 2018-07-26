<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    //
        protected $table = 'warehouse';
    public $timestamps = false;



    public function fetchWarehouse($isbn){

    		$count=count($isbn);
    		for($y=0;$y<$count;$y++){

    			$sql="select warehouseCode from stocks where ISBN ='".$isbn[$y]."' and number=(select max(number) from stocks where ISBN ='".$isbn[$y]."')";
    			$r=\DB::select($sql);
    	 		if($r!=0){
    	 			return $r;
    	 		}
    	 		else{
    	 			return 0;
   				 }
		    }
		}
}
