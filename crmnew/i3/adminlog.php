<?php
session_start();
/* connect to the db */
include('config.php');
if(isset($_GET['user']) && isset($_GET['password']) ) {

	
	
	//$format = strtolower($_GET['format']) == 'json' ? 'json' : 'xml'; //xml is the default
	$user_id = $_GET['user']; //no default
$pass = $_GET['password']; //no default

$p=MD5($pass);
	
	/* grab the posts from the db */
	
	$result = mysql_query("SELECT * FROM admin WHERE username = '$user_id' and password= '$p'") or die('Error in select');
	$row = mysql_fetch_assoc($result);
$total=mysql_num_rows($result);
$username=$row['username'];
//$response["login"] = array();


$response["admin"] = array();

	if($total !=0){
		//echo "hello";
	$i=0;
		do{
			
			//echo 1;

	$posts["username"]=$username;
		
		array_push($response["admin"], $posts);
	$i++;	}while($post=mysql_fetch_assoc($result));
	}else{echo "erroMsg:invalidData";}
		
	echo json_encode($response);	
	
}
else{echo "errorMsg:invalidInput";}
?>