<?php

DEFINE ('DB_USER', 'IN20004926');                    
// The username
DEFINE ('DB_PASSWORD','');                        
//The 
//password
DEFINE ('DB_HOST', 'localhost');                        // The mysql server host address 
DEFINE ('DB_NAME', 'IN20004926');                           
//The database name
@$DB = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if (mysqli_connect_errno())
  {
  echo 'Cannot connect to the database: ' . mysqli_connect_error();
  }
?>
