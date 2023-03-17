<?php
$ApiToken="YogeshDinodia";
$ApiUrl="https://softhuge.com/api/v1";
if(isset($_REQUEST['ifsc'])){
	$ifsc = trim(strip_tags($_REQUEST["ifsc"]));
	$ifsc_length = strlen($ifsc);
	if($ifsc=='' || $ifsc_length<9){
		$msg_array["StatusCode"]=400;
		$msg_array["Message"]="Invalid IFSC Code";
		array_push($json, $msg_array);
	}
	else{
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $ApiUrl."/ifsc?ifsc=$ifsc&token=".$ApiToken);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$output=curl_exec($curl);
		curl_close($curl);
		echo $output;
	}
}

?>
