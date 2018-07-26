<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Contain;
use Session;
use App\Shoppingbasket;
use App\Stocks;
use App\Shippingorder;
use App\Warehouse;
class SearchController extends Controller
{
    //
    public function index(Request $request)
    {
        $user=Session::get('loginuser');
        $contains_model= new Contain();
        $result=$contains_model->count($user);
        $c=count($result);
        Session::put('basketcount',$c);
        $result1='null';
    	$criteria=$request->input('search');
        $books_model= new Book();

    	if($criteria=='Search By Author'){
            $result1=$books_model->search_by_author($request);
    	}
    	if($criteria=='Search By Title'){
             $result1=$books_model->search_by_title($request);
    	}
         $result2=$books_model->totalstock($result1);
    	return view('searchlist')->with(array('data'=>$result1,'stock'=>$result2));
    }

    public function addtocart(Request $request){
        $quantity=$request->input('quantity');
        $isbn=$request->input('isbn');
        $basket_model= new Shoppingbasket();
        $user=Session::get('loginuser');
       $basketID=$basket_model->getBasketID($user);
        Session::put('basketID',$basketID);
        $contains_model= new Contain();
        $result=$contains_model->addtocart($quantity,$isbn,$basketID);
        $contains_model= new Contain();
        $resultm=$contains_model->count($user);
        $c=count($resultm);
        Session::put('basketcount',$c);
        echo $result;
        return redirect('/search');


    }



    public function shoppingbasket()
    {
        $user=Session::get('loginuser'); 
        $price=array();
        $totalprice=0;
        $contains_model= new Contain();
        $result=$contains_model->shoppingbasket($user); 
        foreach ($result as $row) {
            array_push($price, $row->price);
        }


        return view('shoppingbasket')->with(array('data'=>$result));
    }


    public function buy()
    {
        $basketID=Session::get('basketID');
      $user=Session::get('loginuser');
      $stocks_model=new Stocks();
      $basket_model= new Shoppingbasket();  
       $contains_model= new Contain();
        $result=$contains_model->shoppingbasket($user); 
       $isbn=array();
        $price=array();
        $title=array();
        $quantity=array();
        $warehouse=array();
        foreach($result as $row){
            array_push($isbn, $row->ISBN);
            array_push($price, $row->price);
            array_push($title, $row->title);
            array_push($quantity, $row->number);
         }

        $warehouse_model=new Warehouse();
        $result2=$warehouse_model->fetchWarehouse($isbn);
        print_r($result2);
        foreach($result2 as $row){
                array_push($warehouse,$row->warehouseCode);
        }

        $shippingorder_model=new ShippingOrder();
        $result6=$shippingorder_model->placeorder($isbn,$quantity,$warehouse,$user);
        if($result6=="success"){
                $result3=$stocks_model->updatestocks($isbn,$quantity,$warehouse);
                $result4=$contains_model->deletebasket($basketID);
                $result5=$basket_model->deletebasket($basketID);
                $msg="Placed Order";
                Session::put('basketcount',0);
                return view('buy')->with($isbn,$price,$title,$quantity,$msg);



        }
        else
        {
            echo "unable to place order";
        }





    }
}
