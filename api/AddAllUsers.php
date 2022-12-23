
<?php
if(isset($_POST["staffusername"]) && isset($_POST["staffpass"]) && isset($_POST["Role"]) )
{   

 
$staffusername = htmlentities($_POST["staffusername"]); 
$staffpass = htmlentities($_POST["staffpass"]); 
$Role = htmlentities($_POST["Role"]); 

   
  $result="";
  include('../MainConnect.php'); 
  if(!$MainConnect){
    $result = "Server Connection Error";
    
  }
  else{

session_start();
$store=  $_SESSION['store'] ;
$dbname=  $_SESSION['dbname'] ;
$dbusername=  $_SESSION['dbusername'] ;
$dbpassword=  $_SESSION['dbpassword'] ;
$server=  $_SESSION['server'] ;
$tax=  $_SESSION['tax'] ;
$address=  $_SESSION['address'] ;
$store=  $_SESSION['store'] ;
$store=  $_SESSION['store'] ;

 
    
      // for New insertion
            $query = "insert into tblfbrtransactions(id,store,dbname,username,password,server,staffusername
            ,staffpass,tax,role,address) values (1,?,?,?,?,?,?,?,?,?,?) ";

            $params = array(&$store,&$dbname,&$dbusername,&$dbpassword,&$server,&$staffusername,&$staffpass,
              &$tax,&$Role,&$address);
            $stmt = sqlsrv_prepare($MainConnect, $query, $params);
 
    if (sqlsrv_execute( $stmt ) === false ) 
    {
      $result="Not Inserted";
    }
    else{
      $result="Inserted";
    }
  
  }
  
   


  $data ["result"] = $result;
    echo json_encode($data);

}
?>