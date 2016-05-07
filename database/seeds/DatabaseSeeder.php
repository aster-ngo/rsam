<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Model::unguard();

		 $this->call('UserTableSeeder');
		 // $this->call('DataBandsSeeder');
		// $this->call('RoleTableSeeder');
	}

}

class UserTableSeeder extends Seeder {
	
	public function run()
	{
		User::create([
				'name' => 'admin',
				'email' => "admin@gmail.com",
				'password' => bcrypt("123456"),
				'role' => 4
			]);
	}

}

class DataBandsSeeder extends Seeder{
	public function run(){
		DB::table('data_bands')->insert([

			array('filename'=>'SVI01', 'band'=>'://All_Data/VIIRS-I1-SDR_All/Reflectance'),
			array('filename'=>'SVI02', 'band'=>'://All_Data/VIIRS-I2-SDR_All/Reflectance'),
			array('filename'=>'SVI03', 'band'=>'://All_Data/VIIRS-I3-SDR_All/Reflectance'),
			array('filename'=>'SVI04', 'band'=>'://All_Data/VIIRS-I4-SDR_All/Reflectance'),
			array('filename'=>'SVI05', 'band'=>'://All_Data/VIIRS-I5-SDR_All/Reflectance'),
			array('filename'=>'SVM01', 'band'=>'://All_Data/VIIRS-M1-SDR_All/Reflectance'),
			array('filename'=>'SVM02', 'band'=>'://All_Data/VIIRS-M2-SDR_All/Reflectance'),
			array('filename'=>'SVM03', 'band'=>'://All_Data/VIIRS-M3-SDR_All/Reflectance'),
			array('filename'=>'SVM04', 'band'=>'://All_Data/VIIRS-M4-SDR_All/Reflectance'),
			array('filename'=>'SVM05', 'band'=>'://All_Data/VIIRS-M5-SDR_All/Reflectance'),
			array('filename'=>'SVM06', 'band'=>'://All_Data/VIIRS-M6-SDR_All/Reflectance'),
			array('filename'=>'SVM07', 'band'=>'://All_Data/VIIRS-M7-SDR_All/Reflectance'),
			array('filename'=>'SVM08', 'band'=>'://All_Data/VIIRS-M8-SDR_All/Reflectance'),
			array('filename'=>'SVM09', 'band'=>'://All_Data/VIIRS-M9-SDR_All/Reflectance'),
			array('filename'=>'SVM10', 'band'=>'://All_Data/VIIRS-M11-SDR_All/Reflectance'),
			array('filename'=>'SVM11', 'band'=>'://All_Data/VIIRS-M11-SDR_All/Reflectance'),
			array('filename'=>'SVM12', 'band'=>'://All_Data/VIIRS-M12-SDR_All/Radiance'),
			array('filename'=>'SVM13', 'band'=>'://All_Data/VIIRS-M13-SDR_All/Radiance'),
			array('filename'=>'SVM14', 'band'=>'://All_Data/VIIRS-M14-SDR_All/Radiance'),
			array('filename'=>'SVM15', 'band'=>'://All_Data/VIIRS-M15-SDR_All/Radiance'),
			array('filename'=>'SVM16', 'band'=>'://All_Data/VIIRS-M16-SDR_All/Radiance'),
			array('filename'=>'AVAFO', 'band'=>'://All_Data/VIIRS-AF-EDR_All/fireMask'),
			array('filename'=>'GAERO', 'band'=>'://All_Data/VIIRS-Aeros-EDR-GEO_All/Height'),
			array('filename'=>'GDNBO', 'band'=>'://All_Data/VIIRS-DNB-GEO_All/Height_TC'),
			array('filename'=>'GIMGO', 'band'=>'://All_Data/VIIRS-IMG-GEO_All/Height'),
			array('filename'=>'GITCO', 'band'=>'://All_Data/VIIRS-IMG-GEO-TC_All/Height'),
			array('filename'=>'GMODO', 'band'=>'://All_Data/VIIRS-MOD-GEO_All/Height'),
			array('filename'=>'GMTCO', 'band'=>'://All_Data/VIIRS-MOD-GEO-TC_All/Height'),
			array('filename'=>'ICDBG', 'band'=>'://All_Data/VIIRS-MOD-UNAGG-GEO_All/height'),
			array('filename'=>'IICMO', 'band'=>'://All_Data/VIIRS-CM-IP_All/QF4_VIIRSCMIP'),
			array('filename'=>'IVAMI', 'band'=>'://All_Data/VIIRS-Aeros-Opt-Thick-IP_All/angexp'),
			array('filename'=>'IVCDB', 'band'=>'://All_Data/VIIRS-DualGain-Cal-IP_All/radiance_4'),
			array('filename'=>'IVCOP', 'band'=>'://All_Data/VIIRS-Cd-Opt-Prop-IP_All/QF2_VIIRSCOPIP'),
			array('filename'=>'IVISR', 'band'=>'://All_Data/VIIRS-Surf-Refl-IP_All/QF4_VIIRSSRIPSDR'),
			array('filename'=>'IVIWT', 'band'=>'://All_Data/VIIRS-INWCTT-IP_All/ctt')

		]);
	}
}

class RoleTableSeeder extends Seeder {
	
	public function run()
	{
		DB::table('rolers')->insert([
			array('id'=>1, 'permission'=>'user'),
			array('id'=>2, 'permission'=>'manager'),
			array('id'=>3, 'permission'=>'manager database'),
			array('id'=>4, 'permission'=>'manager system')
		]);
	}

}
