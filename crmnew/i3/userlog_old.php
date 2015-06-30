<?php
session_start();
/* connect to the db */
include('config.php');
if(isset($_GET['user']) && isset($_GET['pwd'])) {

	
	
	//$format = strtolower($_GET['format']) == 'json' ? 'json' : 'xml'; //xml is the default
	$user_id = $_GET['user']; //no default
    $password=$_GET['pwd'];
	$pass=MD5($password);
	
	/* grab the posts from the db */
	
	$result = mysql_query("SELECT * FROM user WHERE userid = '$user_id' and password='$pass'") or die('Error in select');
	$row = mysql_fetch_assoc($result);
	$total=mysql_num_rows($result);

//$response["login"] = array();
$response["userlog"]=array();

	if($total !=0){

			$posts['resp']='success';
			$posts['userid'] = $row['user_id'];
			$posts['name'] = $row['name'];
			$posts["phone"] = $row['phone'];
			$posts["type"] = $row['log_type'];
			$posts['del_point'] = $row['del_point'];
			$posts["status"] = $row['status'];
			
				array_push($response["userlog"], $posts);
	}else{$posts['resp']='failure';
	array_push($response["userlog"], $posts);
	}
		
	echo json_encode($posts);	
	
}
else{echo "errorMsg:invalidInput";}
?>