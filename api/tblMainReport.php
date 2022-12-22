<?php
// Prepare array
 
  include("../MainConnect.php");
  $mysql_data = array();
  $result="";
  $message="";
  if($MainConnect)
  {
    $query = "select transactionid,fbrid,amount from tblfbr";
    $stmt = sqlsrv_query($MainConnect, $query, array(), array("Scrollable" => 'static')) or die(sqlsrv_errors());
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
          "transactionid" => $res['transactionid'],
          "fbrid" => $res['fbrid'],
          "amount" => $res['amount'], 
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
 
?>