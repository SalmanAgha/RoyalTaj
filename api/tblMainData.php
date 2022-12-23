<?php


if(  isset($_POST['field1']))
{
	  session_start();

	$store =   $_SESSION['store'];
  $tax =  $_SESSION['tax'];
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

$where = ' and ';
// $field1 = 'RTGUL-RTGC-175117';
if($field1 != ""){
	$where .= " RTT.transactionid='".$field1."' ";
}
else {
	$where .='';

}
 



//     $query = " select RTT.CUSTACCOUNT
//  ,DIRPARTYTABLE.name as CustomerNAme 
//  , RTST.itemid,ECORESPRODUCTTRANSLATION.NAME as ItemNAme,RTST.price, abs(RTST.QTY) as QTY, abs(RTST.NETAMOUNT) as NETAMOUNT
// ,( select abs(sum(RL.NETAMOUNT))
//  from  RETAILTRANSACTIONSALESTRANS RL  
//  where RL.transactionid=RTT.transactionid) as nettotal
//  from  RETAILTRANSACTIONSALESTRANS RTST 
//  inner join RETAILTRANSACTIONTABLE RTT on RTT.TRANSACTIONID= RTST.TRANSACTIONID  
//  inner join CUSTTABLE on custtable.accountnum = Rtt.CustAccount
//  inner join DIRPARTYTABLE on Custtable.PARTY = DIRPARTYTABLE.RECID
//  inner join Inventtable on INventtable.itemid = RTST.ITEMID
//  inner join ECORESPRODUCTTRANSLATION on Inventtable.PRODUCT = ECORESPRODUCTTRANSLATION.PRODUCT
//   ".$where." ";

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
    "dbcustomername" => $dbcustomername,
    "tax" => $tax,
    "dbfield1" => $dbfield1,
    "data"    => $mysql_data
  );
// Convert PHP array to JSON array
  $json_data = json_encode($data);
  print $json_data;
														

}

?>
