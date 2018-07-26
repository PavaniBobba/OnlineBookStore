<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\CollectionObject;
use App\DB;
class Book extends Model
{
    //
    public $table = 'book';
    public $timestamps = false;



    public function search_by_author($request)
    {
    	$text=$request->input('text_to_search');
    	 \DB::enableQueryLog();
    	$result=\DB::table('book')
    			->join('writtenby','book.ISBN','=','writtenby.ISBN')
    			->join('author', 'author.ssn', '=', 'writtenby.ssn')
    			->where('author.name','like','%'.$text.'%')
    			->get();
		//print_r(\DB::getQueryLog());
    	return $result;

    }

    public function search_by_title($request)
    {
    	$text=$request->input('text_to_search');
    	\DB::enableQueryLog();
    	$result=\DB::table('book')
    			->join('writtenby','book.ISBN','=','writtenby.ISBN')
    			->join('author', 'author.ssn', '=', 'writtenby.ssn')
    			->where('book.title','like','%'.$text.'%')
    			->get();
    	//print_r(\DB::getQueryLog());
    	return $result;

    }


    public function totalstock($result)
    {
    	$isbn=array();
    	$stock=array();
    	foreach ($result as $row) {
    		array_push($isbn, $row->ISBN);
    	}
    	for($i=0;$i<count($isbn);$i++){
						$s="select SUM(number) as count from stocks as s INNER JOIN warehouse as wh on wh.warehouseCode=s.warehouseCode and s.ISBN='".$isbn[$i]."'";
						$r=\DB::select($s);
						array_push($stock,$r);
			}
			return $stock;
    }
}
