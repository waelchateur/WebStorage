<?php 
error_reporting(0);
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);
if(isset($_POST['url'])){
$dir = opendir($_POST['url']); 
$string = "[";
while (($dosya = readdir($dir)) !== false) 
{

if(! is_dir($dosya)){ 
if($dosya != "api.php"){
if($dosya != ".htacces"){
if($dosya != "filelist.php"){
$string = $string. '{
"file" : "'. $dosya . '"},';
}
}
}
}}
closedir($dir);
$string = substr($string,0,strlen ($string)-1);
$string = $string. "]";
echo $string;
}
?>
