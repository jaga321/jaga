<?php
session_start();
/* connect to the db */
include('config.php');
if(isset($_GET['user']) && isset($_GET['type'])) {

	
	
	//$format = strtolower($_GET['format']) == 'json' ? 'json' : 'xml'; //xml is the default
	$user_id = $_GET['user']; //no default
        $type=$_GET['type'];
	
	
	/* grab the posts from the db */
      if(($type === 'VLE') || ($type === 'FLD')){
	
	$result = mysql_query("SELECT * FROM enquiry WHERE userid='$user_id'") or die('Error in select');
	
} 
else {
$result = mysql_query("SELECT * FROM enquiry e,lead l WHERE l.enquiry_id=e.id and l.buy_status='0' and l.dealer<>2") or die('Error in select');
}
	$row = mysql_fetch_assoc($result);
	$total=mysql_num_rows($result);

//$response["login"] = array();
$response["enquiry"] = array();
	if($total !=0){
	
	/* INSERT INTO `enquiry`(`id`, `userid`, `name`, `phone`, `distic`, `village`, `product_type`, `remarks`, `approval_status`, `lead_status`, `agent_id`, `status`, `df`, `update_dt`, `post_dt`) */

do{
			$posts['resp']='success';
			$posts['id']=$row['enquiry_id'];
			$posts['userid'] = $row['userid'];
			$posts['name'] = $row['name'];
			$posts["phone"] = $row['phone'];
			$posts["district"] = $row['distic'];
			$posts['village'] = $row['village'];
			$posts['product_type'] = $row['product_type'];
			$posts['remaks'] = $row['remarks'];
			$posts["approval_status"] = $row['approval_status'];
			$posts["lead_status"] = $row['lead_status'];
			$posts["status"] = $row['status'];						
			array_push($response["enquiry"], $posts);
			}while($row = mysql_fetch_assoc($result));
			
				
	}else{$posts['resp']='failure';
	array_push($response["enquiry"], $posts);
	}
		
	echo json_encode($response);	
	
}
else{echo "errorMsg:invalidInput";}
?>