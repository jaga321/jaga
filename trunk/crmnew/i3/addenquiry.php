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

$response["addenquiry"]=array();
$q=mysql_query("INSERT INTO `enquiry` (`userid`, `name`, `phone`, `distic`, `village`, `product_type`, `remarks`, `approval_status`, `lead_status`,`agent_id`, `status`, `df`,  `update_dt`, `post_dt`) VALUES('$user','$name','$ph','$dis','$vil','$pro','$remarks','0','0','','0','','','')") or die('Error in insert');

	$posts['resp']='success';
	
		array_push($response["addenquiry"], $posts);
}
else {
$posts['resp']='failure';
	
		array_push($response["addenquiry"], $posts);

}

	echo json_encode($response);	
?>