<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\MetadataRequest;

use Illuminate\Http\Request;

class MetadatadownloadController extends Controller {

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
	public function download_txt(MetadataRequest $request)
	{
        $name_product= $request->metadata_name_product;
        $name_product_txt=$name_product.".txt";
        $filename="FTPSite/RSAM/org/remote sensing/SatOrgMOD04/2015/".$name_product."/".$name_product_txt;
        $fp = fopen($filename, "rb");

        header("Content-type: application/octet-stream");
        header("Content-length: " . filesize($filename));
        header('Content-disposition: attachment; filename="'.$name_product_txt.'"');
        fpassthru($fp);
        fclose($fp);
	}
    public function download_png(MetadataRequest $request)
    {
        $name_product= $request->metadata_name_product;
        $name_product_png=$name_product.".png";
        $filename="FTPSite/RSAM/org/remote sensing/SatOrgMOD04/2015/".$name_product."/".$name_product_png;
        $fp = fopen($filename, "rb");

        header("Content-type: application/octet-stream");
        header("Content-length: " . filesize($filename));
        header('Content-disposition: attachment; filename="'.$name_product_png.'"');
        fpassthru($fp);
        fclose($fp);
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
