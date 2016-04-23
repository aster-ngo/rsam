<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Request as RequestAjax;
use Illuminate\Http\Request;

class PlotController extends Controller {


	public function getRequest(Request $request){
		if(Request::ajax()){
			return "is ok";
		}
	}

	public function postRequest(){
		$pathForlder = "D:/Study/Khoaluan/data/FIMO/";


		if(RequestAjax::ajax()) {

			$request = RequestAjax::all();


			$message = "Not Found.";

			$table = DB::table('meteorological.' .$request['variable']. '_daily')->select('time', 'filename', 'pathfile')->whereBetween('time', [$request['fromDate'], $request['toDate']])->orderby('time', 'ASC')->get();

			// if($table->count() < 0){
			// 	$message = $table->filename;
			// }
			$data = "NULL";
			$result = "NotFound";

			$count = 0;
			$list = "";

			$rowEnd = $table[count($table)-1];

			foreach($table as $row){
				$list = $list. ',' .$row->time;

				$data = $row->pathfile. ',' .$row->filename. ',' .$row->time. ',' .$rowEnd->time. ',' .$request['variable']. ',' .$request['minlat']. ',' .$request['minlon']. ',' .$request['maxlat']. ',' .$request['maxlon']. ',' .$request['typeresult']. ',' .$request['typemap']. ',' .$request['typewind'];

				$result = shell_exec('python D:\Study\Khoaluan\netCDF\workspace\plot.py ' . escapeshellarg(json_encode($data)));
				$count ++;
			}

		    $response = array(
	            'status' => 'success',
	            'listTime' => $list,
	            'number' => $count,
	            'msg' => $result,
	        );	

		    $response = json_encode($response);
	      return $response;
	    }
	}

}
