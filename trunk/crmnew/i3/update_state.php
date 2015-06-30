<?php
session_start();
/* connect to the db */
include('config.php');
if(isset($_GET['user']) && isset($_GET['clk']) && isset($_GET['status'])) {

	
	
	//$format = strtolower($_GET['format']) == 'json' ? 'json' : 'xml'; //xml is the default
	$user_id = $_GET['user']; //no default
              $id=$_GET['clk'];
              $sta=$_GET['status'];
	
	
	/* grab the posts from the db */
	
	$result = mysql_query("UPDATE enquiry SET comments='$sta' WHERE id= '$id'") or die('Error in select');


$response["update"] = array();


			$posts['resp']='success';

			
				
		array_push($response["update"], $posts);
	echo json_encode($response);	
	
}
else{echo "errorMsg:invalidInput";}
?>