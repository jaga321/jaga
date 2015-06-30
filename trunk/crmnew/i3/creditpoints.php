<?php
session_start();
/* connect to the db */
include('config.php');
if(isset($_GET['user']) && isset($_GET['pts'])) {

	
	
	//$format = strtolower($_GET['format']) == 'json' ? 'json' : 'xml'; //xml is the default
	$user_id = $_GET['user']; //no default
    $points=$_GET['pts'];
	
	
	/* grab the posts from the db */
	
	$result = mysql_query("UPDATE user SET del_point='$points' WHERE user_id = '$user_id'") or die('Error in update');


$response["update"] = array();


			$posts['resp']='success';

			
				
		array_push($response["update"], $posts);
	echo json_encode($response);	
	
}
else{echo "errorMsg:invalidInput";}
?>