<?php


if(isset($_POST['fbrid'])  && isset($_POST['transid']) && isset($_POST['finaltotal']))
{
  

  $fbrid = htmlentities($_POST["fbrid"]);
  $transid = htmlentities($_POST["transid"]);
  $finaltotal = intval(str_replace(',', '', htmlentities($_POST["finaltotal"])));
  $serverName = "";
    $userId = "";
    $userPassword = "";
    $database = "";
 
 $fbrid = (int)$fbrid;
 $fbrid = $fbrid ; 
$finaltotal = (int)$finaltotal;

  $result = '';

  include('../MainConnect.php'); 
     // no prev reading present, insert query will work
             $query = "insert into tblfbr(transactionid,fbrid,amount) values('".$transid."',".$fbrid.",".$finaltotal.")" ;
            $stmt = sqlsrv_query($MainConnect, $query,array(),array("Scrollable"=>'static')) or DIE(print_r(sqlsrv_errors(), true));
            
   // $query = "insert into tblfbr(transactionid,fbrid,amount) values(".$fbrid.",".$transid.",".$finaltotal.")" ;
   // $stmt = $MainConnect->prepare("insert into tblfbr(transactionid,fbrid,amount) values(?,?,?)");
   //  $stmt->bind_param('iii', $fbrid,$transid,$finaltotal); 
   //  $stmt->execute();
                     
                      // $stmt = sqlsrv_query($MainConnect, $query, array(), array("Scrollable" => 'static')) or die(sqlsrv_errors());
                      //     $stmt->execute();
                    
 if($stmt){

       $result = 'successful';

 }else {
     $result = 'unsuccessful';
 }

  // Prepare data
  $data = array(
    "result"  => $result,   
  );

// Convert PHP array to JSON array
  $json_data = json_encode($data);
  print $json_data;
                            

}

?>
