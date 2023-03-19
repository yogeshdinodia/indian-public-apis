<?php
$ApiToken="SOF-br21c-y38zr5uuxcgk-r0qoxwdl57q3";	// Add Your Api Token From softhuge.com, check readme for know how to generate token
$ApiUrl="https://softhuge.com/api/v1";
if(isset($_REQUEST['ifsc'])){
	$ifsc = trim(strip_tags($_REQUEST["ifsc"]));
	$ifsc_length = strlen($ifsc);
	if($ifsc_length<9){
		$msg_array["StatusCode"]=400;
		$msg_array["Message"]="Invalid IFSC Code";
		array_push($json, $msg_array);
		echo json_encode($json[0]);
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
