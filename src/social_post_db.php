<?php
//define root path
$currentFolder = explode('/',$_SERVER['PHP_SELF']);
define("MAIN_ROOT",$_SERVER['DOCUMENT_ROOT'].'/'.$currentFolder[1]);

require_once MAIN_ROOT.'/vendor/autoload.php';

$requestType 		= $_REQUEST['requestType']; // request parameter
$conf_array			= parse_ini_file(MAIN_ROOT."/config.ini" , true);//read config file

if($requestType=='postData')
{
	$status			= true;//maintain a status for error handling
	$msg            = '';//error message
	$arrHeader 		= json_decode($_REQUEST['arrHeader'],true);//decode the header json array
	$arrDetails 	= json_decode($_REQUEST['arrDetails'],true);//decodet the detail json array
	
	foreach($arrDetails as $array_loop)
	{
		require_once MAIN_ROOT."/class/".$array_loop['class'].".php";//include the relavent class
		
		$obj_social     	= new $array_loop['class']($conf_array[$array_loop['name'].':'.$array_loop['class']]);
		
		if($status)
		{
			$responseArr	= $obj_social->send($arrHeader['message']);//call the send function in above relavent class
			if($responseArr['type']=='fail' && $status)//check send function return fail and error status is true
			{
				$status		= false;//identified there is error
				$msg        = $responseArr['msg'];//assing error message
			}
		}
	}

	if($status)
	{
		$response['type']	 = 'pass';
		$response['msg'] 	 = 'Successfully posted'; 	
	}
	else
	{
		$response['type']	 = 'fail';
		$response['msg'] 	 = $msg;
	}
}
	
echo json_encode($response);
?>