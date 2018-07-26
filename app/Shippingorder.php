<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shippingorder extends Model
{
    //
        protected $table = 'shippingorder';
    public $timestamps = false;


    public function placeorder($isbn,$quantity,$warehouse,$user){
    	$count=count($isbn);
    	 for($z=0;$z<$count;$z++){
    			$sql="insert into shippingorder values ('".$isbn[$z]."','".$warehouse[$z]."','".$user."','".$quantity[$z]."')";
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
