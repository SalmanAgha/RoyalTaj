<?php


if(  isset($_POST['field1']) && isset($_POST['buttonname']))
{
 session_start();

 $store =   $_SESSION['store'];
 $tax =  $_SESSION['tax'];
 $field1 = htmlentities($_POST["field1"]);
 $buttonname = htmlentities($_POST["buttonname"]); 
 
 $serverName = "";
 $userId = "";
 $userPassword = "";
 $database = "";
 
 
 $result = array(); 


 $serverName =$_SESSION['server'];
 $userId = $_SESSION['dbusername'];
 $userPassword = $_SESSION['dbpassword'];
 $database = $_SESSION['dbname'];

 $connectionInfo = array("UID" => $userId,
  "PWD" => $userPassword,
  "Database"=> $database,
  "TrustServerCertificate"=>True);
 $StoreConnect = sqlsrv_connect($serverName,$connectionInfo);
 if(!$StoreConnect){
        // print_r(sqlsrv_errors(), true);
  echo "<script>alert('Oops connection Problem')</script>";
}


if($StoreConnect)
{
  $where = 'where'; 
  if($field1 != ""){
   $where .= " transactionid='".$field1."' ";
 }
 else {
   $where .='';

 }
 
 

    $query = " Update ax.[RETAILTRANSACTIONTABLE] Set [".$buttonname."] = '1' ".$where." ";
 

 $stmt = sqlsrv_query($StoreConnect, $query, array(), array("Scrollable" => 'static')) or die(sqlsrv_errors());
 if (!$query )  {
  $result  = "error";
  $message = "query error";
}
else
{
  $result  = "success";
  $message = "query success";
  $empty="";
 
}
//   // Close database connection
}
// Prepare data
$data = array(
  "result"  => $result,
  "message" => $message,  
  "dbfield1" => $field1
);
// Convert PHP array to JSON array
$json_data = json_encode($data);
print $json_data;


}

?>
