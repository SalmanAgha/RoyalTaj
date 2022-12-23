<?php


if(  isset($_POST['Transaction']))
{
	  session_start();

	$store =   $_SESSION['store'];
  $tax =  $_SESSION['tax'];

	$field1 = htmlentities($_POST["Transaction"]); 
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



$where = '';
// $field1 = 'RTGUL-RTGC-175117';
if($field1 != ""){
	$where .= " and RTT.transactionid='".$field1."' ";
}
else {
	$where .='';

}
  
    $query = "SELECT RTT.store,RTT.TRANSACTIONID,RPT.STARTDATE AS  ORDERDATE ,cast(RPT.STARTDATE as Date)  STARTDATE ,B.ORDERTYPE,EC.NAME AS HNAME,ECPT.NAME AS INAME, (RTST.QTY *-1) QTY,RTST.PRICE,
RTST.DISCAMOUNT * -1 DISCAMOUNT, RTST.TRANSACTIONSTATUS, 
RTST.NETAMOUNT * -1 NETAMOUNT,GETDATE(),B.PERSONS,RTST.ITEMID,RTST.LINENUM,REFERENCENAME as CustomerNAme  , CONTACTNUMBER as CustomerContact ,ADDRESS as CustomerAddress 
FROM RETAILTRANSACTIONTABLE RTT
INNER JOIN RETAILTRANSACTIONSALESTRANS RTST ON RTST.TRANSACTIONID = RTT.TRANSACTIONID
AND RTT.DATAAREAID   =RTST.DATAAREAID
INNER JOIN INVENTTABLE IT ON IT.ITEMID = RTST.ITEMID AND IT.DATAAREAID = RTST.DATAAREAID
LEFT JOIN RETAILPOSBATCHTABLE RPT on RPT.BATCHID = RTT.BATCHID AND RTT.STORE = RPT.STOREID
LEFT JOIN ax.RBOBOOKINGS B on B.BOOKINGID = RTT.COMMENT
LEFT JOIN ECORESPRODUCTTRANSLATION ECPT ON ECPT.PRODUCT       = IT.PRODUCT
LEFT JOIN ECORESPRODUCTCATEGORY ECP on IT.PRODUCT = ECP.PRODUCT
LEFT JOIN ECORESCATEGORY EC on ec.RECID  = ECP.CATEGORY
LEFT JOIN HCMWORKER HW ON HW.PERSONNELNUMBER = RTT.STAFF
LEFT JOIN DIRPARTYTABLE DP ON DP.RECID = HW.PERSON 
where  (RTT.DATAAREAID IN ('T-RB'))
AND (ECPT.LANGUAGEID ='en-us') ".$where." ";
 
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
 
      	$dbcustomername= $res['CustomerNAme'];
        $PERSONS= $res['PERSONS'];
        $ORDERTYPE= $res['ORDERTYPE'];
        $STARTDATE= $res['ORDERDATE'];
        

      	$dbfield1 = $field1;

 

        $mysql_data[] = array
        (
          "itemid" => $res['INAME'],
          "price" => number_format(round($res['PRICE'])),
          "QTY" => round($res['QTY']), 
          "NETAMOUNT" => number_format(round($res['NETAMOUNT'])),
          "nettotal" => number_format(round($res['NETAMOUNT'])),
          "nettotal2" => $res['NETAMOUNT']
          
        );
      }
    }
//   // Close database connection
  }
// Prepare data
  $data = array(
    "result"  => $result,
    "message" => $message,
    // "STARTDATE" => $STARTDATE,    
    "PERSONS"  => $PERSONS,
    "ORDERTYPE" => $ORDERTYPE,
    "dbcustomername" => $dbcustomername,
    "staffusername" => $_SESSION['staffusername'], 
    "tax" => $tax,
    "dbfield1" => $dbfield1,
    "data"    => $mysql_data
  );
// Convert PHP array to JSON array
  $json_data = json_encode($data);
  print $json_data;
														

}

?>
