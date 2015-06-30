<?php
session_start();
/* connect to the db */
include('config.php');
if(isset($_GET['user'])) {

	
	$sud='';
	//$format = strtolower($_GET['format']) == 'json' ? 'json' : 'xml'; //xml is the default
	$user_id = $_GET['user']; //no default

	
	
	/* grab the posts from the db */
	
	$result = mysql_query("SELECT * FROM lead WHERE buyer_id='$user_id' and dealer='1'") or die('Error in select');
	$row = mysql_fetch_assoc($result);
	$total=mysql_num_rows($result);

//$response["login"] = array();
$response["enquiry"] = array();
	if($total !=0){
do{

                  $result1 = mysql_query("SELECT * FROM enquiry WHERE id='".$row['enquiry_id']."'") or die('Error in select');
	$row1 = mysql_fetch_assoc($result1);
	
	                  $sud='no';
			$posts['resp']='success';
			$posts['userid'] = $row['userid'];
			$posts['remarks'] = $row1['remarks'];
                        $posts['id'] = $row['id'];
			$posts['name'] = $row1['name'];
			$posts["phone"] = $row1['phone'];
			$posts["district"] = $row1['distic'];
			$posts['village'] = $row1['village'];
			$posts['product_type'] = $row1['product_type'];
			$posts["approval_status"] = $row1['approval_status'];
			$posts["lead_status"] = $row1['lead_status'];
			$posts["status"] = $row['status'];
			
			
				array_push($response["enquiry"], $posts);
				}while($row = mysql_fetch_assoc($result));
	}else{$posts['resp']='failure';
	array_push($response["enquiry"], $posts);
	}
		$result2 = mysql_query("SELECT * FROM lead WHERE dealer='2' and delr_id='$user_id'") or die('Error in select');
	$row2 = mysql_fetch_assoc($result2);
	$total2=mysql_num_rows($result2);

	if($total2 !=0){
do{

                  $result1 = mysql_query("SELECT * FROM enquiry WHERE id='".$row2['enquiry_id']."'") or die('Error in select');
		  $row1 = mysql_fetch_assoc($result1);
	
			$posts['resp']='success';
			$posts['userid'] = $row2['userid'];
			$posts['remarks'] = $row1['remarks'];
                        $posts['id'] = $row2['id'];
			$posts['name'] = $row1['name'];
			$posts["phone"] = $row1['phone'];
			$posts["district"] = $row1['distic'];
			$posts['village'] = $row1['village'];
			$posts['product_type'] = $row1['product_type'];
			$posts["approval_status"] = $row1['approval_status'];
			$posts["lead_status"] = $row1['lead_status'];
			$posts["status"] = $row2['status'];
			
			
				array_push($response["enquiry"], $posts);
				}while($row2 = mysql_fetch_assoc($result2));
	}else{
	if($sud==='yes'){
	$posts1['resp']='failure';
	array_push($response["enquiry"], $posts1);
	}
	}
	echo json_encode($response);	
	
}
else{echo "errorMsg:invalidInput";}
?>