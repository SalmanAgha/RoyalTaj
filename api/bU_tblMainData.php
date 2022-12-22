<?php


if(isset($_POST['store'])  && isset($_POST['field1']))
{
	

	$store = htmlentities($_POST["store"]);
	$field1 = htmlentities($_POST["field1"]); 
	$serverName = "";
    $userId = "";
    $userPassword = "";
    $database = "";
 

	$result = array(); 

	include('../MainConnect.php'); 
                      $query = "select dbname,username,password,server from tblfbrtransactions where store = '".$store."'";
                      $stmt = sqlsrv_query($MainConnect, $query, array(), array("Scrollable" => 'static')) or die(sqlsrv_errors());
                      while ($row = sqlsrv_fetch_array($stmt))
                      {
                      	$serverName = $row["server"];
    					$userId = $row["username"];
    					$userPassword = $row["password"];
    					$database = $row["dbname"]; 
                     } 
 
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
// $field1 = 'RTGUL-RTGC-175117';
if($field1 != ""){
	$where .= " RTT.transactionid='".$field1."' ";
}
else {
	$where .='';

}
 



    $query = "select  RTST.itemid,RTST.price, RTST.QTY, RTST.NETAMOUNT
 from  RETAILTRANSACTIONSALESTRANS RTST 
 inner join RETAILTRANSACTIONTABLE RTT on RTT.TRANSACTIONID= RTST.TRANSACTIONID ".$where." ";
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

      while ($res = sqlsrv_fetch_array($stmt))
      {  

        $mysql_data[] = array
        (
          "itemid" => $res['itemid'],
          "price" => $res['price'],
          "QTY" => $res['QTY'], 
          "NETAMOUNT" => $res['NETAMOUNT']
        );
      }
    }
//   // Close database connection
  }
// Prepare data
  $data = array(
    "result"  => $result,
    "message" => $message,
    "data"    => $mysql_data
  );
// Convert PHP array to JSON array
  $json_data = json_encode($data);
  print $json_data;
														

}

?>
