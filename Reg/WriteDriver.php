  
<html>
<head>
	<title>iCarZ register driver</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<header>
    <h1>iCarZ</h1>
</header>
<?php
  include("DataBase.php");   
  

  $Email		 = $_POST['E_mail_address'];
  $Password   	 = $_POST['Passwrd'];
  $Surname   	 = $_POST['Driver_Surname'];
  $Initials   	 = $_POST['Driver_Initials'];
  $Date_of_birth   	 = $_POST['Driver_DOB'];
  $Mobile_no  	 = $_POST['Mobile_no'];
  $DVLA   	 = $_POST['DVLA_no'];
  $Gender   	 = $_POST['Driver_genderMF'];

  if(isset($_POST['Driver_genderMF'])){ // this part is made specially for radio buttons
                                    // to find M input to be M value and F button to be a F value
    $allowedAnswers = array('M', 'F');

  }


  
  //echo $Email;
  //echo $Password;
  //echo $Surname;
  //echo $Initials;
  //echo $Date_of_birth;
  //echo $Mobile_no;
  //echo $Gender;
  //echo $DVLA;
  
  //insertion of data from registration
  $Query = "insert into Driver 
  (E_mail_address,Passwrd,Driver_Surname,Driver_Initials,Driver_DOB,Mobile_no,Driver_genderMF,DVLA_no) values 
  ('$Email','$Password','$Surname','$Initials','$Date_of_birth','$Mobile_no','$Gender','$DVLA')";
  
  
  $Result = mysqli_query($DB,$Query); 	 
  
 if ($Result) {
  echo '<FORM METHOD="LINK" ACTION="loginDriver.php">';
  echo '<INPUT TYPE="submit" VALUE="Back to Login">';
  echo '</FORM>';		
  echo 'Driver details inserted';
 }
	
	
 
  
  else

	echo 'Sorry - unable to complete the operation at present';
  

?>


</FORM>

</body>
</html>