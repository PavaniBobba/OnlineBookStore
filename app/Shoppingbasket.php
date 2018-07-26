<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shoppingbasket extends Model
{
    //
        protected $table = 'shoppingbasket';
    public $timestamps = false;


    public function getBasketID($user)
    {
    	$basketID=0;
    	echo $user;
    $sql="select * from shoppingbasket where username='".$user."'";
    $sql1="insert into shoppingbasket (username) VALUES ('".$user."')";

    	$r=\DB::select($sql);

    	if(!$r){
    		echo "new";
    		$r1=\DB::select($sql1);
    		if($r1!=0){
    				$r2=\DB::select($sql);
    				foreach ($r2 as $row){ 
    						 $basketID=$row->basketID;
    						}
    			}
    		}
    	foreach ($r as $row){ 
    		$basketID=$row->basketID;
    		}
    	return $basketID;

    }

    public function deletebasket($basketID){
         $sql="delete from shoppingbasket where basketID='".$basketID."'";
                 $r=\DB::select($sql);
                if($r!=0){
                    return "success";
                }
                else{
                    return "fail";
                 }
                 return "error";
    }
}
