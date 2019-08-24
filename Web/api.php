<?php
error_reporting(0);
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);
if ( isset($_POST["key"])){
		if(isset($_POST["name"])){
				$Base64 = $_POST["key"];
				$Site = ("data:image/png;base64,". $Base64);
				$name = $_POST["name"];
				$url = $Site;
				$uzakdosya = file_get_contents($url);
				$kaydet = file_put_contents($name, $uzakdosya);
				if($kaydet){
					echo '{
					"status":"1",
					"filename":"'.$name.'",
					"url":"'.'http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['HTTP_HOST']."/".$name.'"
					}';
				}else{  
					echo '{
					"status":"0",
					"error":"An unknown error has occurred!"
					}';
}
	}else{
		    echo '{
    "status":"0",
    "error":"Enter File Name!"
    }';
	}
}else{
    echo '{
    "status":"0",
    "error":"No Files Uploaded!"
    }';
} 
?>
