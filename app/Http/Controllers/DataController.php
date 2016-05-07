<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request as RequestAjax;
use App\Http\Requests\DataRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class DataController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return view('users.rs_result');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

    public function testRequest()
    {
        if (RequestAjax::ajax()) {

            $request = RequestAjax::all();

            $date = $request['date'];


            $response = array(
                'status' => 'success',
                'message' => $date,
            );

            $response = json_encode($response);
            return $response;
        }
    }

    public function result_data(DataRequest $request){
        $date_to=$request->date_to;
        $date_from=$request->date_from;
        $type_product=$request->type_product;

        if ($type_product == 'MOD04'){
            $count=DB::table('eos.mod04')->whereBetween('aqstime',array($date_from,$date_to))->count();
            $result_mod04=DB::table('eos.mod04')->whereBetween('aqstime',array($date_from,$date_to))->get();
            return view('users.rs_result')->with('result_data',$result_mod04)->with('type_product',$type_product)->with('count',$count);
        }else if($type_product=='MOD07'){
            $count=DB::table('eos.mod07')->whereBetween('aqstime',array($date_from,$date_to))->count();
            $result_mod07=DB::table('eos.mod07')->whereBetween('aqstime',array($date_from,$date_to))->get();
            return view('users.rs_result')->with('result_data',$result_mod07)->with('type_product',$type_product)->with('count',$count);
        }

    }
	public function download(MetadataRequest $request)
	{


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
