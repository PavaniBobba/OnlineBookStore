<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contain extends Model
{
    //
    protected $table = 'contains';
    public $timestamps = false;


    public function addtocart($quantity,$isbn,$basketID)
    {
    	 $sql2= "INSERT INTO contains VALUES ('".$isbn."','".$basketID."','".$quantity."')";
    	 $r=\DB::select($sql2);
    	 if($r!=0){
    	 	return "added to cart";
    	 }
    	 else
    	 	return "unable to add to cart";
    }

    public function count($user){
    	$sql="select * from contains as c INNER JOIN shoppingbasket as sb on c.basketID=sb.basketID where sb.username='".$user."'";
    	$r=\DB::select($sql);
    	 if($r!=0){
    	 	return $r;
    	 }
    	 else{
    	 	return 0;
    }
    }

    public function shoppingbasket($user)
    {
    	$sql = "select * from contains as c INNER JOIN shoppingbasket as sb on c.basketID=sb.basketID LEFT JOIN book as b on b.ISBN=c.ISBN LEFT JOIN writtenby as wb on b.ISBN=wb.ISBN LEFT JOIN author as a on a.ssn=wb.ssn where sb.username='".$user."'";
    	$r=\DB::select($sql);
    	 if($r!=0){
    	 	return $r;
    	 }
    	 else{
    	 	return 0;
    }

    }


    public function deletebasket($basketID)
    {
        $sql="delete from contains where basketID='".$basketID."'";
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
