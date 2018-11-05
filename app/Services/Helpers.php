<?php
namespace App\Services;

use PHPExcel, PHPExcel_IOFactory, Storage;  


class Helpers{
	/**
	 *
	 *@param $data 数据 
	 *
	 *return json
	 */
	static public function resJson($url='', $err_code = 0, $message = '',$data = '') {

		$message 										= $message ?: config('user.err_code')[$err_code];	

       	return \Response::json([
       			'err_code' => $err_code,
       		 	'message'  => $message, 
       		 	'data'     => $data,
       		 	'url'      => $url
       		 ]);
	}


	/**
	 *
	 * 导入
	 */

	static public function getExcelData($file) {

		$fileinfo 									 	= pathinfo($file);
		$ext                                        	= strtolower($fileinfo['extension']);
		$type                                           = $ext=='xlsx' ? 'Excel2007' : 'Excel5';
		
		ini_set('max_execution_time', '0');

		include_once('../app/Libs/PHPExcel/PHPExcel/IOFactory.php');

		$excel 											= new PHPExcel();
		$objReader 										= PHPExcel_IOFactory::createReader($type); 
		$objPHPExcel 									= $objReader->load($file);
		$sheet 											= $objPHPExcel->getSheet(0);    //获得第一个sheet
		$highestRow 									= $sheet->getHighestRow();      //取得总行数
		$highestColumn 									= $sheet->getHighestColumn();   //取得总列数

		//循环读取excel文件，读取一条，插入一条
		$data                                           = array();

		//从第一行开始读取数据
		for ($i=0; $i<=$highestRow; $i++)
		{
			//从A列读取
			for ($j='A'; $j<=$highestColumn; $j++)
			{
				$data[$i][] = $objPHPExcel->getActiveSheet()->getCell("$j$i")->getValue();
			}
		}

		return $data;
	}


	/**
	 *上传文件
	 */
	static public function uploadFile($file, $disk = "") {

		$response                                       = array();

		//判断文件是否上传成功
		if( $file->isValid() ) { 
			//获取文件相关信息
			$ext                                        = $file->getClientOriginalExtension(); //扩展名
			$originalName                               = $file->getClientOriginalName();      //获得文件原名
			$realPath                                   = $file->getRealPath();                //获得临时文件的绝对路径

			//上传文件名称
			$filename 									= date('Ymd') . '/' . date('YmdHis') . uniqid() . $originalName;

			$uploadBool                                 = Storage::disk($disk)->put($filename, file_get_contents($realPath)); 
			$fullpath									= '/uploads/' . strtolower($disk) . '/' . $filename;
			if($uploadBool) {
				$response['error_code']                 = 0;
				$response['message']    				= $filename;
				$response['full_path']    				= $fullpath;
			} else {
				$response['error_code']                 = 1;
				$response['message']    				= '文件上传失败';	
				$response['full_path']    				= '';
			} 
		} else {
			$response['error_code']                 = 1;
			$response['message']    				= '上传文件无效';	
			$response['full_path']    				= '';
		}

		return $response;
	}

	/**
	 *显示图片
	 */
	static public function showImg($path)
	{
		return '/' . UPLOAD_GOODS_IMG . $path;
	}


	/**
	 *根据学校类型 选择
	 */
	static public function getGradesByType($type)
	{
		switch ($type) {
			case '小学':
				$return = "<option value='1'>一年级</option>"
						. "<option value='2'>二年级</option>"
						. "<option value='3'>三年级</option>"
						. "<option value='4'>四年级</option>"
						. "<option value='5'>五年级</option>"
						. "<option value='6'>六年级</option>";
				break;
			
			case '初中':
				$return = "<option value='7'>初一</option>"
						. "<option value='8'>初二</option>"
						. "<option value='9'>初三</option>";
				break;

			case '高中':
				$return = "<option value='10'>高一</option>"
						. "<option value='11'>高二</option>"
						. "<option value='12'>高三</option>";
				break;
		}
		return $return;
	}

	/**
	 *生成订单时 对后五位数字的处理
	 */
	static public function generateStrByNumber( $number )
	{
		switch ( count($number) ) {
			case 1:
				$prefix = '0000';
				break;
			
			case 2:
				$prefix = '000';
				break;

			case 3:
				$prefix = '00';
				break;

			case 4:
				$prefix = '0';
				break;

			case 5:
				$prefix = '';
				break;
		}

		return $prefix . $number;
	}

}