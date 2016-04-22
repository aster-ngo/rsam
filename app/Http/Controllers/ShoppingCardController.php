<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\ShoppingCardResquest;
use Illuminate\Support\Facades\DB;
class ShoppingCardController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function shopping_card(ShoppingCardResquest $resquest)
    {
        $name_product= $resquest->name_product;
        $size_product=$resquest->size_product;
        $time_product=$resquest->time_product;
        $type_product=$resquest->type_product;
        $check_element=$resquest->check_element;
        if ($check_element==$name_product) {
            $insert = DB::table('user_shopping_card')->insert(
                ['datetime' => $time_product,  'size' => $size_product, 'name_product' => $name_product,'type_product' => $type_product,'email'=>'hoangduongk57cb@gmail.com']
            );
            $select_data=DB::table('user_shopping_card')->where('email','hoangduongk57cb@gmail.com')->get();
            return view('rs_result')->with('shopping_data',$select_data);
        }


	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
