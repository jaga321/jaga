<?php
session_start();
/* connect to the db */
include('config.php');
if(isset($_GET['user']) && isset($_GET['clk'])) {

	
	
	//$format = strtolower($_GET['format']) == 'json' ? 'json' : 'xml'; //xml is the default
	$user_id = $_GET['user']; //no default
              $id=$_GET['clk'];
	
	$response["update"] = array();
	
	/* grab the posts from the db 
	
	*/
	
	$result = mysql_query("SELECT * FROM lead WHERE buy_status='0' and enquiry_id='$id'") or die('Error in select');
	$row = mysql_fetch_assoc($result);
	$total=mysql_num_rows($result);
	
	if($total==1){
	$result1 = mysql_query("UPDATE lead SET buy_status='1',buyer_id='$user_id' WHERE enquiry_id='$id'") or die('Error in Insert');



			$posts['resp']='success';

			
				
		array_push($response["update"], $posts);
		
		}
		else {
		$posts['resp']='sold out';

			
				
		array_push($response["update"], $posts);
		}
	echo json_encode($response);	
	
}
else{echo "errorMsg:invalidInput";}
?>