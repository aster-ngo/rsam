<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use ZipArchive;
use GifCreator;
use Request as RequestAjax;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class MeteoController extends Controller {


	public function getRequest(Request $request){
		if(Request::ajax()){
			return "is ok";
		}
	}

	public function postRequest(){

		$pathfolder = "";

		if(RequestAjax::ajax()) {

			$request = RequestAjax::all();

			// if(strpos($request['timeDate'], 'daily') !== False){
			$table = DB::table('meteorological.' .$request['variable']. '_'.$request['timeDate'])->select('time', 'filename', 'pathfile')->whereBetween('time', [$request['fromDate'], $request['toDate']])->orderby('time', 'ASC')->get();

			
			$data = "NULL";
			$result = "NotFound";

			$count = 0;
			$list = "";
			$listResutl = "";

			if(count($table) >= 1){

				$message = "success";

				$rowEnd = $table[count($table)-1];

				foreach($table as $row){

					$pathfolder = $row->pathfile;

					$listDate = explode('-', $row->time);

					if($request['timeDate'] == "daily"){
						$list = $list. ',' .$listDate[2]. '-' .$listDate[1]. '-' .$listDate[0];
					} else if($request['timeDate'] == "monthly"){
	                    $list = $list. ',' .$listDate[1]. '-' .$listDate[0];
					}

					$data = $row->pathfile. ',' .$row->filename. ',' .$row->time. ',' .$rowEnd->time. ',' .$request['variable']. ',' .$request['minlat']. ',' .$request['minlon']. ',' .$request['maxlat']. ',' .$request['maxlon']. ',' .$request['typeresult']. ',' .$request['typemap']. ',' .$request['typewind'];

					$result = shell_exec('python D:\Study\Khoaluan\netCDF\workspace\plot.py ' . escapeshellarg(json_encode($data)));
					$listResutl.= $result ."---";
					$count ++;

					if($request['typeresult'] == "chart"){
						break;
					}
				}
			}else{
				$message = "fail";
			}

		    $response = array(
	            'time' => $list,
	            'message' => $message,
	            'number' => $count,
	            'url' => $listResutl,
	            'pathfolder' => $pathfolder
	        );	

		    $response = json_encode($response);
	      return $response;
	    }
	}

	public function getDownloadPNG(Request $request){
		$length = $request['length-list-result-png'];

		$filename = "";
		$listName = "";

		for($i=0; $i<$length; $i++){
			$filename = $request['result-png-' + $i];
		}

		return new RedirectResponse(url('/index.html'));
	}

	public function getShoppingCard(){

		return view('users.shoppingcard');
	}

	public function postDownloadPNG(){

		$pathFolder = "";
		$filename = "";
		$linkDownload = "";

		$message = "fail";
		$state = false;

		if(RequestAjax::ajax()) {
			$request = RequestAjax::all();

			$url = $request['url'];
			$name = $request['name'];
			$filename = $request['filename'];
			$pathFolder = $request['pathfolder'];

			$listURL = explode('---', $url);
			$listName = explode('---', $name);

			$pathFolder .= 'product/';
			if(!is_dir($pathFolder)){
				mkdir($pathFolder);
			}

			$pathFolder .= 'rar/';
			if(!is_dir($pathFolder)){
				mkdir($pathFolder);
			}

			while(!$state){
				$filename .= "_" .date("Ymd"). "_" .rand(). ".rar";
				$linkDownload = $pathFolder . $filename;
				if(!file_exists($linkDownload)){
					$state = true;
				}	
			}

			for($i=0; $i<count($listURL)-1; $i++){

				$zip = new ZipArchive;

				if ($zip->open($pathFolder . $filename,  ZipArchive::CREATE)) {
					$linkPicture = str_replace("\n", "", $listURL[$i]);
					$namePicture = str_replace("\n", "", $listName[$i]);
				    $zip->addFile($linkPicture, $namePicture);
				    
				    $zip->close();

				    
				    $message = "success";
				}
			}

		}

        $response = array(
            'message' => $message,
            'size' => count($listURL),
            'link' => $linkDownload,
            'state' => $state,
	    );	

	    $response = json_encode($response);

      	return $response;
	}

	public function postCreateGIF(){
		$pathFolder = "";
		$filename = "";
		$linkDownload = "";

		$message = "fail";
		$state = false;

		if(RequestAjax::ajax()) {
			$request = RequestAjax::all();

			$url = $request['url'];
			$filename = $request['filename'];
			$pathFolder = $request['pathfolder'];

			$listURL = explode('---', $url);

			$pathFolder .= 'product/';
			if(!is_dir($pathFolder)){
				mkdir($pathFolder);
			}

			$pathFolder .= 'gif/';
			if(!is_dir($pathFolder)){
				mkdir($pathFolder);
			}

			while(!$state){
				$filename .= "_" .date("Ymd"). "_" .rand(). ".gif";
				$linkDownload = $pathFolder . $filename;
				if(!file_exists($linkDownload)){
					$state = true;
				}	
			}

			include("AnimGif.php");

			$anim = new GifCreator\AnimGif();

			$frames = array();

			for($i=0; $i<count($listURL)-1; $i++){
				$linkPicture = str_replace("\n", "", $listURL[$i]);

				array_push($frames, $linkPicture);

			    $message = "success";
				
			}

			$anim	-> create($frames, 40) // first 3s, then 5s for all the others
					-> save($linkDownload);

		}

        $response = array(
            'message' => $message,
            'size' => count($listURL),
            'link' => $linkDownload,
            'state' => $state,
	    );	

	    $response = json_encode($response);

      	return $response;
	}

	public function postAddShoppingCard(){

		$listNameProduct;
		$sizelist = array();
		$message = "fail";

		if(RequestAjax::ajax()) {
			$request = RequestAjax::all();

			$userId = $request['userId'];
			$typeProduct = $request['type-product'];
			$nameproduct = $request['name-product'];

			$listNameProduct = explode('---', $nameproduct);

			$listSize = array();
			$name_table = "";

			if(count($listNameProduct) > 0){
				for($i=0; $i<count($listNameProduct)-1; $i++){

					if(strpos($nameproduct, 'daily') != -1){
						$name_table = "meteorological." .$typeProduct. '_daily';

					}else if(strpos($nameproduct, 'monthly') != -1){
						$name_table = "meteorological." .$typeProduct. '_monthly';

					}

					$size = DB::table($name_table)->where('filename', '=', $listNameProduct[$i])->select('size')->first();
					array_push($listSize, $size->size);

				}
			}

			if(count($listSize) > 0){
				for($i=0; $i<count($listSize); $i++){

					DB::table('user_shopping_card')->insert(array(
							'userid' => $userId,
							'type_product' => $typeProduct,
							'name_product' => $listNameProduct[$i],
							'size' => $listSize[$i],
							'datetime' => date("Y-m-d"),
						));

				    $message = "success";
					
				}
			}

			$sizelist = $listSize;
	        
		}

		$response = array(
	            'message' => $message,
	            'list' => $sizelist,
	    );	

	    $response = json_encode($response);

  		return $response;
	}

}
	