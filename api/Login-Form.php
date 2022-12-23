<?php


if(isset($_POST['username']) &&  isset($_POST['pass']) )
{
	

	$username = $_POST["username"]; 
	$Password = $_POST["pass"]; 
	$dbemail = '';
	$dbPassword = '';
	$role = '';
	$dbusername = '';
	$result = '';

 
	$result = array(); 

	include('../MainConnect.php');  
	$query = "select staffusername,staffpass,store,dbname,username,password,server,tax ,role,address
	from tblfbrtransactions where staffusername = '".$username."'";
	$stmt = sqlsrv_query($MainConnect, $query, array(), array("Scrollable" => 'static')) or die(sqlsrv_errors());
	while ($row = sqlsrv_fetch_array($stmt))
	{
		$staffusername = $row["staffusername"];
		$staffpass = $row["staffpass"];
		$store = $row["store"];
		$dbname = $row["dbname"]; 
		$dbusername = $row["username"];
		$dbpassword = $row["password"]; 
		$server = $row["server"]; 
		$tax = $row["tax"];
		$role = $row["role"]; 
		$address = $row["address"]; 
		
	} 

 

	if($staffusername == NULL)
	{

		$result = "norecord";

	}	

	else if(strtoupper($username) == strtoupper($staffusername) &&  $Password == $staffpass )
	{	


		session_start();
		$_SESSION['staffusername'] = $staffusername;
		$_SESSION['staffpass'] = $staffpass;
		$_SESSION['store'] = $store;
		$_SESSION['dbname'] = $dbname;
		$_SESSION['dbusername'] = $dbusername; 
		$_SESSION['dbpassword'] = $dbpassword;
		$_SESSION['server'] = $server; 
		$_SESSION['tax'] = $tax; 
		$_SESSION['role'] = $role; 
		$_SESSION['address'] = $address; 
		


 
		$store = $store;
		$username  = $staffusername;
		$result = "successful";


	} 


	$data["username"] = $username;
	$data["role"] = $role;
	$data["result"] = $result;
	echo json_encode($data);



}

?>
