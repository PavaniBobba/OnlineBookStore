<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stocks extends Model
{
    //
        protected $table = 'stocks';
    public $timestamps = false;


    public function updatestocks($isbn,$quantity,$warehouse){
    	$count=count($quantity);
    	 for($i=0;$i<$count;$i++){
    	 	$sql="update stocks set number=number-".$quantity[$i]." where warehouseCode='".$warehouse[$i].
        "' and ISBN='".$isbn[$i]."'";
        $r=\DB::select($sql);
    	 		if($r!=0){
    	 			return "success";
    	 		}
    	 		else{
    	 			return "fail";
   				 }}
   				 return "error";

    }
}
