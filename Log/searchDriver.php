<html>
<head>
	<title>iCarZ successful login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<header>
    <h1>iCarZ</h1>
</header>
<?php
  include("DataBase.php");
  $Email	 = $_POST['E_mail_address'];
  $Password 	 = $_POST['Passwrd'];
  
//echo $Email;
//echo $Password;
  

  
  $Query = "SELECT E_mail_address, Passwrd FROM Driver
  WHERE  E_mail_address = '$Email'
  AND Passwrd = '$Password'"; // basically searches a DB with this certain combination of email and pass
  
  
  $Result = mysqli_query($DB,$Query);
				 	 
  $row = mysqli_fetch_array($Result);
									   
  $NumResults = mysqli_num_rows($Result);	
  							   
if ($Email == 'admin' || $Password == 'admin')//this is a special function for an admin 
                            // to enter internal function not to be seen by normal mortals aka regualr users
{

  echo '<tr>';
  echo '<h2>Welcome admin!</h2>';
  echo '<FORM METHOD="LINK" ACTION="chooseAdmin.php">';
  echo '<INPUT TYPE="submit" VALUE="AdminPage">';
  echo '</tr>';
  

}
else

      if ($NumResults==1)//the resopnse for a regualr user that is already registred and can be found in DB
      { 
      

      $row=mysqli_fetch_row($Result);

      $UserNo=$row['UserNo'];
      echo '<h2>'.'Welcome !'.'</h2>';

      echo '<br/>Successful login!  ';
      echo  '<tr>
      <h2> Click here to go to booking or invoice print</h2>
      <FORM METHOD="LINK" ACTION="MainMenu.php">
      <INPUT TYPE="submit" VALUE="MainMenu">
      </tr>'; 
      } 
      
      else
      {
      echo '<h2>'.'User not found OR wrong password OR both OR multiple matches found'.'</h2';
      
      echo '<tr>';
      echo '<h2>Go back to Homepage</h2>';
      echo '<FORM METHOD="LINK" ACTION="HomePage.php">';
      echo '<INPUT TYPE="submit" VALUE="HomePage">';
      echo '</tr>';
      }

?>
 

</body>
</html>