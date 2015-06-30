<?php
session_start();
/* connect to the db */
include('config.php');
if(isset($_GET['user']) && isset($_GET['name']) && isset($_GET['phone']) && isset($_GET['district']) && isset($_GET['village']) && isset($_GET['pro']) && isset($_GET['remarks'])) {

$user=$_GET['user'];
$name=$_GET['name'];
$ph=$_GET['phone'];
$dis=$_GET['district'];
$vil=$_GET['village'];
$pro=$_GET['pro'];
$remarks=$_GET['remarks'];

/*
INSERT INTO `enquiry` (`id`, `userid`, `name`, `phone`, `distic`, `village`, `product_type`, `remarks`, `approval_status`, `lead_status`, `agent_id`, `status`, `df`, `update_dt`, `post_dt`)
*/

$response["addlead"]=array();
$q=mysql_query("INSERT INTO `enquiry` (`userid`, `name`, `phone`, `distic`, `village`, `product_type`, `remarks`, `approval_status`, `lead_status`,`agent_id`, `status`, `df`,  `update_dt`, `post_dt`) VALUES('$user','$name','$ph','$dis','$vil','$pro','$remarks','1','1','','0','','','')") or die('Error in insert');


$eid=mysql_insert_id();
/* grab the posts from the db 
	
	INSERT INTO `lead`(`enquiry_id`, `userid`, `days`, `designation`, `lead_status`, `buy_status`, `buyer_id`, `comments`, `status`, `df`, `expiry_date`, `update_dt`, `post_dt`) VALUES ()
	*/
	
	$res=mysql_query("INSERT INTO `lead`(`enquiry_id`, `userid`, `days`, `dealer`, `delr_id`,`lead_status`, `buy_status`, `buyer_id`, `comments`, `status`, `df`, `expiry_date`, `update_dt`, `post_dt`) VALUES ('$eid','$user','0','2','$user','1','1','$user','','Pending Site Visit','','','','')") or die('Error in insert');

	$posts['resp']='success';
	
		array_push($response["addlead"], $posts);
}
else{echo "errorMsg:invalidInput";}

echo json_encode($response);
?>